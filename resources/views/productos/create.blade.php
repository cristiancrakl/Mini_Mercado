@extends('layouts.app')

@section('title','Crear Producto')

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('productos.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Nombre<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control" name="nombre"
                                                        placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                        value="{{ old('nombre') }}">

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Descripcion<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control" name="descripcion"
                                                        placeholder="Por ejemplo, este articulo es" autocomplete="off"
                                                        value="{{ old('descripcion') }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Unidad de Medida<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control"
                                                        name="unidad_medida" placeholder="Por ejemplo, Juan Tirilo"
                                                        autocomplete="off" value="{{ old('unidad_medida') }}">

                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Precio de venta<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control"
                                                        name="precio_venta" placeholder="Por ejemplo, Juan Tirilo"
                                                        autocomplete="off" value="{{ old('precio_venta') }}">

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Precio de compra <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control"
                                                        name="precio_compra" placeholder="Por ejemplo, Juan Tirilo"
                                                        autocomplete="off" value="{{ old('precio_compra') }}">

                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">stock<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control" name="stock"
                                                        placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                        value="{{ old('stock') }}">

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Stock minimo<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control"
                                                        name="stock_minimo" placeholder="Por ejemplo, Juan Tirilo"
                                                        autocomplete="off" value="{{ old('stock_minimo') }}">
                                                </div>
                                            </div>

                                            <label class="control-label">imagen <strong
                                                    style="color:red;">(*)</strong></label>
                                            <input required type="file" class="form-control" name="imagen"
                                                placeholder="Por ejemplo, Juan Tirilo" autocomplete="off"
                                                value="{{ old('imagen') }}">



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
                                        <a href="{{ route('productos.index') }}"
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