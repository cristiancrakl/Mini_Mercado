@extends('layouts.app')

@section('title','Ver Factura')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3>@yield('title')</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Factura ID:</strong> {{ $factura->id }}
                        </div>
                        <div class="col-md-4">
                            <strong>Cliente:</strong> {{ $factura->cliente->nombre ?? 'N/A' }}
                        </div>
                        <div class="col-md-4">
                            <strong>Fecha:</strong> {{ $factura->fecha ?? $factura->created_at->format('Y-m-d') }}
                        </div>
                    </div>

                    <h5>Detalle de Productos</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($factura->detalleFacturas as $detalle)
                                <tr>
                                    <td>{{ $detalle->producto->nombre ?? 'N/A' }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>${{ number_format($detalle->sub_total, 2) }}</td>
                                    <td>${{ number_format($detalle->sub_total, 2) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No hay items en esta factura.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-end mt-3">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <strong>Subtotal:</strong>
                                        <span>${{ number_format(($factura->total - ($factura->iva ?? 0)), 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <strong>IVA:</strong>
                                        <span>${{ number_format($factura->iva ?? 0, 2) }}</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <strong>Total:</strong>
                                        <span>${{ number_format($factura->total, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Atras</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection