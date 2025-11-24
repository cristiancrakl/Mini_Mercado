@extends('layouts.app')

@section('title', 'Sesión Expirada')

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

    .error-419-container {
        text-align: center;
    }

    .error-419-title {
        font-size: 80px;
        font-weight: 800;
        color: #f59e0b; /* Amarillo/Naranja */
        margin-bottom: 10px;
        text-shadow: 4px 4px 0px rgba(0,0,0,0.15);
    }

    .error-419-subtitle {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .error-419-text {
        font-size: 18px;
        max-width: 300px;
        margin: 0 auto 30px;
        opacity: .8;
    }

    .error-419-illustration {
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
    <div class="error-419-container">

        <div class="error-419-title">419</div>

        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png"
             class="error-419-illustration"
             alt="Sesión expirada">

        <div class="error-419-subtitle">Sesión Expirada</div>

        <p class="error-419-text">
            Tu sesión ha expirado.  
            Por favor, actualiza la página o vuelve a intentarlo.
        </p>

        <a href="{{ route('home') }}" class="btn btn-warning px-4 py-2" style="color:#000;">
            Volver al Inicio
        </a>
    </div>
</div>
@endsection