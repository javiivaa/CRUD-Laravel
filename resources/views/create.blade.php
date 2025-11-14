@extends('layout')

@section('content')
	<h1>Crear Regalo</h1>
	<form action="{{ route('regalos.store') }}?token=demo" method="POST">
		@csrf
		<label>Nombre: <input type="text" name="name"></label>
		<label>Usuario:
			<select name="user_id">
				<option value="">-- ninguno --</option>
				@foreach($users as $u)
					<option value="{{ $u->id }}">{{ $u->name }}</option>
				@endforeach
			</select>
		</label>
		<button type="submit">Crear</button>
	</form>
@endsection
