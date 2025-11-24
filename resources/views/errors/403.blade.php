@extends('layouts.app')

@section('title', 'Acceso Denegado')

@section('content')
<style>
    .error-wrapper {
        margin-left: 180px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(80vh - 150px);
        padding: 20px;
    }

    .error-403-container {
        text-align: center;
    }

    .error-403-title {
        font-size: 80px;
        font-weight: 800;
        color: #e63946; /* Rojo más elegante */
        margin-bottom: 10px;
        text-shadow: 4px 4px 0px rgba(0,0,0,0.15);
    }

    .error-403-subtitle {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .error-403-text {
        font-size: 18px;
        max-width: 300px;
        margin: 0 auto 30px;
        opacity: .8;
    }

    .error-403-illustration {
        max-width: 150px;
        margin: 20px auto;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-12px); }
        100% { transform: translateY(0px); }
    }
</style>

<div class="error-wrapper">
    <div class="error-403-container">

        <div class="error-403-title">403</div>

        <img src="https://cdn-icons-png.flaticon.com/512/595/595067.png"
             class="error-403-illustration"
             alt="Acceso Denegado">

        <div class="error-403-subtitle">Acceso Denegado</div>

        <p class="error-403-text">
            No tienes permisos para acceder a esta sección.  
            Si crees que esto es un error, contacta al administrador.
        </p>

        <a href="{{ route('home') }}" class="btn btn-danger px-4 py-2">
            Volver al Inicio
        </a>
    </div>
</div>
@endsection