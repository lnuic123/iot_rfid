
@extends('layouts.app')
@section('content')
{!! Form::open(['action' => 'SerialController@userLogout', 'method' => 'POST']) !!}
{{ Form::hidden('room', $room) }}
{{Form::submit('Odjavi se iz sobe', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection