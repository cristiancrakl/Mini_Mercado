@extends('layouts.app')

@section('title', 'Error del Servidor')

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

    .error-500-container {
        text-align: center;
    }

    .error-500-title {
        font-size: 80px;
        font-weight: 800;
        color: #6b21a8; /* Morado oscuro */
        margin-bottom: 10px;
        text-shadow: 4px 4px 0px rgba(0,0,0,0.18);
    }

    .error-500-subtitle {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .error-500-text {
        font-size: 18px;
        max-width: 320px;
        margin: 0 auto 30px;
        opacity: .8;
    }

    .error-500-illustration {
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
    <div class="error-500-container">

        <div class="error-500-title">500</div>

        <img src="https://cdn-icons-png.flaticon.com/512/564/564619.png"
             class="error-500-illustration"
             alt="Error de servidor">

        <div class="error-500-subtitle">Error Interno del Servidor</div>

        <p class="error-500-text">
            Ocurrió un problema inesperado dentro del servidor.  
            Estamos trabajando para solucionarlo. Por favor, intenta nuevamente más tarde.
        </p>

        <a href="{{ route('home') }}" class="btn btn-dark px-4 py-2">
            Volver al Inicio
        </a>
    </div>
</div>
@endsection