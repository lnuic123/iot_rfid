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
        	<a href="/admin/{{$room->id}}" class="btn btn-default" style="width: 200px;height: 100px;padding-top: 50px">{{$room->name}}</a>
        @endforeach
    </div>

@endsection