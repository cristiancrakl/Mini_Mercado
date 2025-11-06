@extends('layouts.app')

@section('title','Crear Metodo de Pago')

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('metodoPagos.store') }}">
                            @csrf
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
                                                        value="{{ old('nombre') }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Descripcion <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control" name="descripcion"
                                                        placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                        value="{{ old('descripcion') }}">
                                                </div>
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
                                            <a href="{{ route('metodoPagos.index') }}"
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