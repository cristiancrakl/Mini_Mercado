@extends('layouts.app')

@section('title','Editar Metodo de Pago')

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('metodoPagos.update', $metodoPago->id) }}">
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
                                                        placeholder="Por ejemplo, Efectivo" autocomplete="off"
                                                        value="{{ $metodoPago->nombre }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Descripcion <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control" name="descripcion"
                                                        placeholder="Por ejemplo, Pago en efectivo" autocomplete="off"
                                                        value="{{ $metodoPago->descripcion }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="estado" value="{{ $metodoPago->estado }}">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-2 col-xs-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-block btn-flat">Actualizar</button>
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