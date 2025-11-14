@extends('layout')

@section('content')
	<h1>Ver Regalo</h1>
	<p>Nombre: {{ $regalo->name }}</p>
	@if($regalo->user)
		<p>Usuario: {{ $regalo->user->name }}</p>
	@endif
	<a href="{{ route('regalos.edit', $regalo->id) }}">Editar</a>
@endsection
