<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <style>
        .roomButtons{
            text-align: center;
        }
        .switch-field input {
            position: absolute !important;
            clip: rect(0, 0, 0, 0);
            height: 1px;
            width: 1px;
            border: 0;
            overflow: hidden;
        }

        .switch-field label {
          display: inline-block;
          width: 200px;
          height: 100px;
          line-height: 70px; /* <-- this is what you must define */
          vertical-align: middle;
          background-color: white;
          color: rgba(0, 0, 0, 0.6);
          text-align: center;
          padding: 6px 14px;
          border: 1px solid rgba(0, 0, 0, 0.2);
        }
        .switch-field input:checked + label {
          background-color: lightblue;
          -webkit-box-shadow: none;
          box-shadow: none;
        }
    </style>
</head>
@extends('layouts.app')
@section('content')

<div class="roomButtons">
    {!! Form::open(['action' => 'SerialController@userLogin', 'method' => 'POST']) !!}
    <div class="switch-field">
    @foreach($rooms as $room)
        {{ Form::radio('room', $room->id, false, array('id'=>$room->id)) }}
        {{ Form::label($room->id, $room->name) }}
    @endforeach
    </div>
    {{Form::submit('Prijavi korisnika', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

@endsection