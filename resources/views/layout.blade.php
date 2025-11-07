<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Regalos</title>
	<style>body{font-family:Arial,Helvetica,sans-serif;padding:18px} .nav{margin-bottom:12px}</style>
	@stack('head')
</head>
<body>
	<div class="nav">
		<a href="{{ route('regalos.index') }}">Inicio</a> | 
		<a href="{{ route('regalos.create') }}">Crear regalo</a>
	</div>

	@if(session('error'))<div style="color:#a00">{{ session('error') }}</div>@endif
	@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif

	@yield('content')
</body>
</html>
