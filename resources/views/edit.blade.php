@extends('layout')

@section('content')
	<h1>Editar Regalo</h1>
	<form action="{{ route('regalos.update', $regalo->id) }}?token=demo" method="POST">
		@csrf
		@method('PUT')
		<label>Nombre: <input type="text" name="name" value="{{ $regalo->name }}"></label>
		<label>Usuario:
			<select name="user_id">
				<option value="">-- ninguno --</option>
				@foreach($users as $u)
					<option value="{{ $u->id }}" {{ $regalo->user_id == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
				@endforeach
			</select>
		</label>
		<button type="submit">Actualizar</button>
	</form>
@endsection
