@extends('layouts.app')
@section('content')

		<a href="/admin" class="btn btn-primary" style="margin-bottom: 20px">Povratak</a>
    <div class="roomButtons">
		<a href="/admin/{{$room}}/stats/users" class="btn btn-default" style="width: 200px;height: 100px;padding-top: 35px">Dolaznost korisnika</a>
		<a href="/admin/{{$room}}/stats/userlogins" class="btn btn-default" style="width: 200px;height: 100px;padding-top: 35px">Vrijeme prijave korisnika</a>
		<a href="/admin/{{$room}}/stats/userlogouts" class="btn btn-default" style="width: 200px;height: 100px;padding-top: 35px">Vrijeme odjave korisnika</a>
    </div>

@endsection