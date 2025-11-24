@extends('layouts.app')

@section('title','Editar Factura')

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('facturas.update', $factura->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">

                                            <div class="form-row">
                                                <div class="form-group col-md-6">

                                                    <label class="control-label">ID del cliente<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <select class="form-control" name="cliente_id" id="cliente">
                                                        @foreach($clientes as $cliente)
                                                        <option value="{{ $cliente->id }}" {{ $factura->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}
                                                        </option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                                <div class="form-group col-md-6">

                                                    <label class="control-label">Metodo de Pago<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <select class="form-control" name="ordenCompra_id" id="ordenCompra">
                                                        @foreach($ordenCompras as $ordenCompra)
                                                        <option value="{{ $ordenCompra->id }}" {{ $factura->ordenCompra_id == $ordenCompra->id ? 'selected' : '' }}>
                                                            {{ $ordenCompra->nombre }}
                                                        </option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                            </div>


                                            <div class="form-row">

                                                <div class="form-group col-md-4 ">
                                                    <label class="control-label">Precio de
                                                        compra<strong style="color:red;">(*)</strong></label>
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        name="precio_compra" placeholder="Por ejemplo, 1500"
                                                        value="{{ $factura->precio_compra }}">
                                                </div>


                                                <div class="form-group col-md-4 ">
                                                    <label class="control-label">Saldo
                                                        Pendiente<strong style="color:red;">(*)</strong></label>
                                                    <input type="text" class="form-control" name="saldo_pendiente"
                                                        value="{{ $factura->saldo_pendiente }}"
                                                        placeholder="Por ejemplo, 600" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4 ">
                                                    <label class="control-label">Precio de venta<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input type="text" class="form-control" name="precio_venta"
                                                        value="{{ $factura->precio_venta }}"
                                                        placeholder="Por ejemplo, 1800" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-4 ">
                                                    <label class="control-label">Descuento<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input class="form-control" name="descuento"
                                                        value="{{ $factura->descuento }}"
                                                        placeholder="Por ejemplo, 1800" autocomplete="off">
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>



                                <input type="hidden" class="form-control" name="tipo_pago" value="{{ $factura->tipo_pago }}">



                                <input type="hidden" class="form-control" name="iva" value="{{ $factura->iva }}">

                                <input type="hidden" class="form-control" name="total" value="{{ $factura->total }}">



                                <input type="hidden" class="form-control" name="estado" value="{{ $factura->estado }}">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Actualizar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('facturas.index') }}"
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