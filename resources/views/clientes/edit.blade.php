@extends('layouts.app')

@section('title','Editar Cliente')

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('clientes.update', $cliente->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Nombre <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control" name="nombre"
                                                        placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                        value="{{ $cliente->nombre }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Tipo de documento <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <select required class="form-control" id="tipo_documento"
                                                        name="tipo_documento" required>
                                                        <option value="" disabled>Seleccione una opcion
                                                        </option>
                                                        <option value="CC" {{ $cliente->tipo_documento == 'CC' ? 'selected' : '' }}>CC</option>
                                                        <option value="CE" {{ $cliente->tipo_documento == 'CE' ? 'selected' : '' }}>CE</option>
                                                        <option value="TI" {{ $cliente->tipo_documento == 'TI' ? 'selected' : '' }}>TI</option>
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">numero documento <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control"
                                                        name="numero_documento" placeholder="Por ejemplo, 1067-XXX-XXX"
                                                        autocomplete="off" value="{{ $cliente->numero_documento }}">

                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">direccion <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control" name="direccion"
                                                        placeholder="Por ejemplo, calle 9 #X-XX" autocomplete="off"
                                                        value="{{ $cliente->direccion }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">telefono <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control" name="telefono"
                                                        placeholder="Por ejemplo, 311-675-XX-XX" autocomplete="off"
                                                        value="{{ $cliente->telefono }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">email <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="email" class="form-control" name="email"
                                                        placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                        value="{{ $cliente->email }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="estado" value="{{ $cliente->estado }}">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Actualizar</button>
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