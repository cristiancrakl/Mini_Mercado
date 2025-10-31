@extends('layouts.app')

@section('title','Listado De Ordenes de Compra')

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
                            @can('orden_compras.create')
                            <a href="{{ route('orden_compras.create') }}" class="btn btn-primary float-right"
                                title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th>Proveedor</th>
                                        <th>Numero Orden</th>
                                        <th width="60px">Estado</th>
                                        <th>Total</th>
                                        <th width="90px">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ordenCompras as $ordenCompra)
                                    <tr>
                                        <td>{{ $ordenCompra->id }}</td>
                                        <td>{{ $ordenCompra->proveedor->nombre ?? 'N/A' }}</td>
                                        <td>{{ $ordenCompra->numero_orden }}</td>
                                        <td>
                                            {{ $ordenCompra->estado ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td>{{ $ordenCompra->total }}</td>
                                        <td>
                                            @can('orden_compras.edit')
                                            <a href="{{ route('orden_compras.edit',$ordenCompra->id) }}"
                                                class="btn btn-info btn-sm" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('orden_compras.destroy')
                                            <form class="d-inline delete-form"
                                                action="{{ route('orden_compras.destroy', $ordenCompra) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                            @endcan
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