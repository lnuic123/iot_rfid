<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <style>
        .buttonHolder{
            text-align: left;
            width: 70%;
            float: right;
            margin-top: -25px;
        }
        .roomButton{
            width: 200px;
            height: 100px;
            font-size: 20px;
        }
        .roomButtons{
            text-align: center;
        }
    </style>
</head>
@extends('layouts.app')
@section('content')
<div class="roomButtons">
    @foreach($rooms as $room)
        <button type="button" class="btn btn-default roomButton" id="room{{$room->id}}" onclick="roomClicked(this);">{{$room->name}}</button>
    @endforeach
</div>
<div class="idbutton">
    <div style="font-size: 20px; width: 40%; padding-top: 10px;">Identifikacija korisnika:</div>
    <div class="buttonHolder">
        <a href="{{action('SerialController@test')}}" class="btn btn-success" style="width: 50%">Link name</a>
    </div>
</div>

@endsection