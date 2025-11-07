@extends('layout')

@section('content')
	<h1>Crear Regalo</h1>
	<form action="{{ route('regalos.store') }}?token=demo" method="POST">
		@csrf
		<label>Nombre: <input type="text" name="name"></label>
		<button type="submit">Crear</button>
	</form>
@endsection
