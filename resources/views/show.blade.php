@extends('layout')

@section('content')
	<h1>Ver Regalo</h1>
	<p>Nombre: {{ $regalo->name }}</p>
	<a href="{{ route('regalos.edit', $regalo->id) }}">Editar</a>
@endsection
