@extends('layouts.app')
@section('title', 'Página No Encontrada')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-1">404</h1>
    <h2 class="mb-4">Página No Encontrada</h2>
    <p class="lead">Lo sentimos, la página que estás buscando no existe.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Volver al Inicio</a>
</div>
@endsection