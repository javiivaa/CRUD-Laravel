@extends('layout')

@section('content')
	<h1>Regalos</h1>
	<ul>
	@forelse($regalos as $r)
		<li>
			{{ $r->name }} 
			<a href="{{ route('regalos.show', $r->id) }}">Ver</a>
			<a href="{{ route('regalos.edit', $r->id) }}">Editar</a>
			<form action="{{ route('regalos.destroy', $r->id) }}?token=demo" method="POST" style="display:inline">
				@csrf
				@method('DELETE')
				<button type="submit">Borrar</button>
			</form>
		</li>
	@empty
		<li>No hay regalos</li>
	@endforelse
	</ul>
@endsection
