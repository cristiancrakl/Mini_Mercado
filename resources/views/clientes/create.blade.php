@extends('layouts.app')

@section('title','Crear Usuario')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3>@yield('title')</h3>
                        </div>
                        <form method="POST" action="{{ route('clientes.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">

                                            <label class="control-label">Nombre <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="nombre"
                                                placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                value="{{ old('nombre') }}">

                                            <label class="control-label">Tipo de documento <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="tipo_documento"
                                                placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                value="{{ old('tipo_documento') }}">

                                            <label class="control-label">numero documento <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="numero_documento"
                                                placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                value="{{ old('numero_documento') }}">

                                            <label class="control-label">direccion <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="direccion"
                                                placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                value="{{ old('direccion') }}">

                                            <label class="control-label">telefono <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="telefono"
                                                placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                value="{{ old('telefono') }}">

                                            <label class="control-label">email <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                value="{{ old('email') }}">



                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="estado" value="1">
                                <input type="hidden" class="form-control" name="registrado_por"
                                    value="{{ Auth::user()->id }}">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('clientes.index') }}"
                                            class="btn btn-danger btn-block btn-flat">Atras</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection