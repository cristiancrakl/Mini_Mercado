@extends('layouts.app')

@section('title','Listado De Facturas')

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary"
                            style="font-size: 1.75rem;font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
                            @yield('title')
                            <a href="{{ route('facturas.create') }}" class="btn btn-primary float-right"
                                title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>IVA</th>
                                        <th>Saldo Pendiente</th>
                                        <th>Tipo Pago</th>
                                        <th>Descuento</th>
                                        <th width="60px">Estado</th>
                                        <th width="90px">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($facturas as $factura)
                                    <tr>
                                        <td>{{ $factura->id }}</td>
                                        <td>{{ $factura->cliente->nombre ?? 'N/A' }}</td>
                                        <td>{{ $factura->total }}</td>
                                        <td>{{ $factura->iva }}</td>
                                        <td>{{ $factura->saldo_pendiente }}</td>
                                        <td>{{ $factura->tipo_pago }}</td>
                                        <td>{{ $factura->descuento }}</td>
                                        <td>
                                            <input data-type="factura" data-id="{{$factura->id}}"
                                                data-url="{{ route('cambioestadoFactura') }}" class="toggle-class"
                                                type="checkbox" data-toggle="switch" data-on-text="Activo"
                                                data-off-text="Inactivo" data-on-color="success" data-off-color="danger"
                                                {{ $factura->estado ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <a href="{{ route('facturas.show',$factura->id) }}" class="btn btn-primary btn-sm" title="Ver"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('facturas.edit',$factura->id) }}"
                                                class="btn btn-info btn-sm" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form class="d-inline delete-form"
                                                action="{{ route('facturas.destroy', $factura) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection