@extends('layouts.app')

@section('title','Editar Producto')

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('productos.update', $producto->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Nombre<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control" name="nombre"
                                                        placeholder="Por ejemplo, Laptop" autocomplete="off"
                                                        value="{{ $producto->nombre }}">

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Descripcion<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control" name="descripcion"
                                                        placeholder="Por ejemplo, este articulo es" autocomplete="off"
                                                        value="{{ $producto->descripcion }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Unidad de Medida<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="text" class="form-control"
                                                        name="unidad_medida" placeholder="Por ejemplo, kg"
                                                        autocomplete="off" value="{{ $producto->unidad_medida }}">

                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Precio de venta<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control"
                                                        name="precio_venta" placeholder="Por ejemplo, 1500"
                                                        autocomplete="off" value="{{ $producto->precio_venta }}">

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Precio de compra <strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control"
                                                        name="precio_compra" placeholder="Por ejemplo, 1000"
                                                        autocomplete="off" value="{{ $producto->precio_compra }}">

                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">stock<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control" name="stock"
                                                        placeholder="Por ejemplo, 50" autocomplete="off"
                                                        value="{{ $producto->stock }}">

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Stock minimo<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input required type="number" class="form-control"
                                                        name="stock_minimo" placeholder="Por ejemplo, 10"
                                                        autocomplete="off" value="{{ $producto->stock_minimo }}">
                                                </div>
                                            </div>

                                            <label class="control-label">imagen</label>
                                            <input type="file" class="form-control" name="imagen"
                                                placeholder="Por ejemplo, imagen.jpg" autocomplete="off">
                                            @if($producto->imagen)
                                            <div class="mt-2">
                                                <p>Imagen actual:</p>
                                                <img src="{{ asset('img/post/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" style="max-width: 200px; max-height: 200px;">
                                            </div>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="estado" value="{{ $producto->estado }}">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Actualizar</button>
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