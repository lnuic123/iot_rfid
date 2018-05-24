<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function get($room){
    	
    	return view('roomstats')->with('room', $room);
    }
}
