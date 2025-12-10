@extends('layouts.app')

@section('title','Crear Factura')

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('facturas.store') }}"
                            id="facturaForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <!-- Sección Superior: Cliente, Fecha y Método de Pago -->
                                        <div class="form-group label-floating">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Cliente<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <select required class="form-control" name="cliente_id"
                                                        id="cliente">
                                                        <option value="">Seleccione un cliente</option>
                                                        @foreach($clientes as $cliente)
                                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Descuento</label>
                                                    <input type="number" class="form-control" name="descuento"
                                                        id="descuento" min="0" step="0.01" value="0">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Saldo Pendiente</label>
                                                    <input type="number" class="form-control" name="saldo_pendiente"
                                                        id="saldo_pendiente" min="0" step="0.01" value="0" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sección de Productos -->
                                        <hr>
                                        <h5><strong>Agregar Productos</strong></h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Producto<strong
                                                        style="color:red;">(*)</strong></label>
                                                <select class="form-control" id="producto" name="producto">
                                                    <option value="">Seleccione un producto</option>
                                                    @foreach($productos as $producto)
                                                    <option value="{{ $producto->id }}"
                                                        data-precio="{{ $producto->precio_venta }}">
                                                        {{ $producto->nombre }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Cantidad<strong
                                                        style="color:red;">(*)</strong></label>
                                                <input type="number" class="form-control" id="cantidad" name="cantidad"
                                                    min="1" placeholder="0" value="1">
                                            </div>
                                            <div class="form-group col-md-3 d-flex align-items-end">
                                                <button type="button" class="btn btn-success btn-block"
                                                    id="agregarProducto">Agregar Producto</button>
                                            </div>
                                        </div>

                                        <!-- Tabla de Detalles -->
                                        <hr>
                                        <h5><strong>Detalle de Productos</strong></h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="detalleTable">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Subtotal</th>
                                                        <th width="80px">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="detalleBody">
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Resumen de Totales -->
                                        <div class="row mt-4">
                                            <div class="col-md-6 offset-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-2">
                                                            <div class="col-8"><strong>Subtotal:</strong></div>
                                                            <div class="col-4 text-right">
                                                                <span id="subtotalLabel">$0.00</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-8"><strong>IVA (19%):</strong></div>
                                                            <div class="col-4 text-right">
                                                                <span id="ivaLabel">$0.00</span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-8"><strong>Total:</strong></div>
                                                            <div class="col-4 text-right">
                                                                <h5 id="totalLabel" style="color: #007bff;">$0.00</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Campos Ocultos -->
                                        <input type="hidden" name="total" id="totalInput" value="0">
                                        <input type="hidden" name="iva" id="ivaInput" value="0">
                                        <input type="hidden" name="saldo_pendiente" id="saldoInput" value="0">
                                        <input type="hidden" name="estado" value="1">
                                        <input type="hidden" name="registrado_por" value="{{ Auth::user()->id }}">
                                        <input type="hidden" id="detalleProductos" name="detalleProductos" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Registrar</button>
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

<script src="{{ asset('js/factura.js') }}"></script>

@endsection