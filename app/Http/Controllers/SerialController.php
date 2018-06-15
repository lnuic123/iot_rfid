<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use lepiaf\SerialPort\Configure\TTYConfigure;
use lepiaf\SerialPort\Parser\SeparatorParser;
use lepiaf\SerialPort\SerialPort;
class SerialController extends Controller
{
	public function adminLogin(Request $request){
		if (!$request->session()->exists('rfid')) {
		    $serialPort = new SerialPort(new SeparatorParser(), new TTYConfigure());

			$serialPort->open("/dev/ttyUSB0");
			while ($data = $serialPort->read()) {
			    //dd($data);
			    //return $data;
				$data = substr($data,1,-2);
				$user = User::where('type', 'admin')->where('rfid', $data)->get();

		    	$rooms = Room::all();
				if(count($user)){ //successful login
					$request->session()->put('rfid', true);
			    	return view('admin')->with('rooms', $rooms);
				}
				else{ //failed login
			    	return view('index')->with('rooms', $rooms);
				}
			}
		}
    	$rooms = Room::all();
    	return view('admin')->with('rooms', $rooms);
		
	}
	public function userLogin(Request $request)
	{
		$this->validate($request, [ //validating if room is selected
            'room' => 'required'
        ]);
		$serialPort = new SerialPort(new SeparatorParser(), new TTYConfigure());
		$serialPort->open("/dev/ttyUSB0");

		while ($data = $serialPort->read()) {

			$data = substr($data,1,-2); //parsing scaned data
			$user = User::where('rfid', $data)->get(); //getting user with scaned id

	    	$logged_user = Auth::user();
			if($logged_user->rfid == $data){
			    DB::table('logins')->insert([ //storing new login
					['user_id' => $logged_user->id, 'time' => Carbon::now(), 'room_id' => $request->room]
				]);

		    	$rooms = Room::all();
		    	return view('room')->with('room', $request->room); //return to index
			}

			return view('index')->with('rooms', $rooms); //return to index
		}
	}
	public function rfidlogin(){
		$serialPort = new SerialPort(new SeparatorParser(), new TTYConfigure());

		$serialPort->open("/dev/ttyUSB0");
		while ($data = $serialPort->read()) {
		    //dd($data);
		    //return $data;
	    	$logged_user = Auth::user();
			$data = substr($data,1,-2);

	    	$rooms = Room::all();
			if($data == $logged_user->rfid && $logged_user->type == 'admin'){
		    	return redirect('admin')->with('rooms', $rooms);
			}
			if($data == $logged_user->rfid && $logged_user->type == 'user'){
		    	return redirect('userlogins')->with('rooms', $rooms);
			}
			return redirect('login');
		}
		
	}
	public function showUserLogins(){
    	$rooms = Room::all();
		return view('index')->with('rooms', $rooms);
	}

	public function userLogout(Request $request){
	    $logged_user = Auth::user();
		DB::table('logouts')->insert([ //storing new login
			['user_id' => $logged_user->id, 'time' => date("Y-m-d h:m:s"), 'room_id' => $request->room]
		]);
    	$rooms = Room::all();
    	$request->session()->forget('rfid');
		return view('index')->with('rooms', $rooms);
	}
} 