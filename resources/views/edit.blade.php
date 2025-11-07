@extends('layout')

@section('content')
	<h1>Editar Regalo</h1>
	<form action="{{ route('regalos.update', $regalo->id) }}?token=demo" method="POST">
		@csrf
		@method('PUT')
		<label>Nombre: <input type="text" name="name" value="{{ $regalo->name }}"></label>
		<button type="submit">Actualizar</button>
	</form>
@endsection
