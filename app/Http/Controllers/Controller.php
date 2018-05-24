<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Room;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index(){
    	$rooms = Room::all();
    	return view('index')->with('rooms', $rooms);
    }
    function admin(){
    	$rooms = Room::all();
    	return view('admin')->with('rooms', $rooms);
    }
}
