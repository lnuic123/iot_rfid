<?php

namespace App\Http\Controllers;

use App\Charts\TestChart;
use App\Login;
use App\Logout;
use App\Room;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class RoomController extends Controller
{
	public function stats($room){
		return view('roomstats')->with('room', $room);
	}

    public function users($room){
        $logins = Login::get();
        $users_num = User::count();
        $user = [];

        for($i = 1; $i <= $users_num; $i++){
            $user[$i] = Login::where('user_id', $i)->where('room_id', $room)->count();
        }



        return view('piechart')->with('logins', $logins)->with('room', $room)->with('user', $user);
    }

    public function userlogins($room)
    {      

        $data1 = [];
        $data2 = [];
        $data3 = [];
        $data4 = [];
        $data5 = [];

        $date1 = [];
        $date2 = [];
        $date3 = [];
        $date4 = [];
        $date5 = [];

        $login_dates1 = Login::where('user_id', 1)->where('room_id', $room)->get();
        $login_dates2 = Login::where('user_id', 2)->where('room_id', $room)->get();
        $login_dates3 = Login::where('user_id', 3)->where('room_id', $room)->get();
        $login_dates4 = Login::where('user_id', 4)->where('room_id', $room)->get();
        $login_dates5 = Login::where('user_id', 5)->where('room_id', $room)->get();

        for($i = 0; $i < $login_dates1->count(); $i++){

            $date1[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $login_dates1[$i]->time);
            $date2[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $login_dates2[$i]->time);
            $date3[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $login_dates3[$i]->time);
            $date4[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $login_dates4[$i]->time);
            $date5[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $login_dates5[$i]->time);

            $data1[$i] = $date1[$i]->secondsSinceMidnight();
            $data2[$i] = $date2[$i]->secondsSinceMidnight();
            $data3[$i] = $date3[$i]->secondsSinceMidnight();
            $data4[$i] = $date4[$i]->secondsSinceMidnight();
            $data5[$i] = $date5[$i]->secondsSinceMidnight();

            $date1[$i] = $date1[$i]->format('Y-m-d H:i:s');
            $date2[$i] = $date2[$i]->format('Y-m-d H:i:s');
            $date3[$i] = $date3[$i]->format('Y-m-d H:i:s');
        }
        $date1 = array_unique($date1);

        return view('barchart')->with('room', $room)->with('dates',$date1)->with('time1',$data1)->with('time2',$data2)->with('time3',$data3)->with('time4',$data4)->with('time5',$data5);

    }

    public function userlogouts($room)
    {
        $data1 = [];
        $data2 = [];
        $data3 = [];
        $data4 = [];
        $data5 = [];

        $date1 = [];
        $date2 = [];
        $date3 = [];
        $date4 = [];
        $date5 = [];

        $logout_dates1 = Logout::where('user_id', 1)->where('room_id', $room)->get();
        $logout_dates2 = Logout::where('user_id', 2)->where('room_id', $room)->get();
        $logout_dates3 = Logout::where('user_id', 3)->where('room_id', $room)->get();
        $logout_dates4 = Logout::where('user_id', 4)->where('room_id', $room)->get();
        $logout_dates5 = Logout::where('user_id', 5)->where('room_id', $room)->get();

        for($i = 0; $i < $logout_dates1->count(); $i++){

            $date1[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $logout_dates1[$i]->time);
            $date2[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $logout_dates2[$i]->time);
            $date3[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $logout_dates3[$i]->time);
            $date4[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $logout_dates4[$i]->time);
            $date5[$i] = Carbon::createFromFormat('Y-m-d H:i:s', $logout_dates5[$i]->time);

            $data1[$i] = $date1[$i]->secondsSinceMidnight();
            $data2[$i] = $date2[$i]->secondsSinceMidnight();
            $data3[$i] = $date3[$i]->secondsSinceMidnight();
            $data4[$i] = $date4[$i]->secondsSinceMidnight();
            $data5[$i] = $date5[$i]->secondsSinceMidnight();

            $date1[$i] = $date1[$i]->format('Y-m-d H:i:s');
            $date2[$i] = $date2[$i]->format('Y-m-d H:i:s');
            $date3[$i] = $date3[$i]->format('Y-m-d H:i:s');
        }
        $date1 = array_unique($date1);

        return view('barchart')->with('room', $room)->with('dates',$date1)->with('time1',$data1)->with('time2',$data2)->with('time3',$data3)->with('time4',$data4)->with('time5',$data5);
    }
}
