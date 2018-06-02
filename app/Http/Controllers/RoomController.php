<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use DB;

class RoomController extends Controller
{
    public function get($room){
    	$logins = DB::select('SELECT * FROM logins');
    	return $logins;
    	
    	return view('roomstats')->with('room', $room);
    }
}
