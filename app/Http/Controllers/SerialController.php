<?php

namespace App\Http\Controllers;

use lepiaf\SerialPort\SerialPort;
use lepiaf\SerialPort\Parser\SeparatorParser;
use lepiaf\SerialPort\Configure\TTYConfigure;
use App\Room;
use App\User;

class SerialController extends Controller
{
	public function test()
	{
		$serialPort = new SerialPort(new SeparatorParser(), new TTYConfigure());

		$serialPort->open("/dev/ttyUSB0");
		while ($data = $serialPort->read()) {
		    //dd($data);
		    return $data;

		    /*if ($data === "OK") {
		        $serialPort->write("1\n");
		        $serialPort->close();
		    }*/
		}
	}
	public function adminLogin(){
		$serialPort = new SerialPort(new SeparatorParser(), new TTYConfigure());

		$serialPort->open("/dev/ttyUSB0");
		while ($data = $serialPort->read()) {
		    //dd($data);
		    //return $data;
			$data = substr($data,1,-2);
			$user = User::where('rfid', $data)->get();

	    	$rooms = Room::all();
			if(count($user)){ //successful login
		    	return view('admin')->with('rooms', $rooms);
			}
			else{ //failed login
		    	return view('index')->with('rooms', $rooms);
			}
		    /*if ($data === "OK") {
		        $serialPort->write("1\n");
		        $serialPort->close();
		    }*/
		}
	}
}