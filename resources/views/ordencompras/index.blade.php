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
                            <a href="{{ route('ordenCompras.create') }}" class="btn btn-primary float-right"
                                title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
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
                                            <input data-type="ordencompra" data-id="{{$ordenCompra->id}}"
                                                data-url="{{ route('cambioestadoOrdenCompra') }}" class="toggle-class"
                                                type="checkbox" data-toggle="switch" data-on-text="Activo"
                                                data-off-text="Inactivo" data-on-color="success" data-off-color="danger"
                                                {{ $ordenCompra->estado ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ $ordenCompra->total }}</td>
                                        <td>

                                            <a href="{{ route('ordenCompras.edit',$ordenCompra->id) }}"
                                                class="btn btn-info btn-sm" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form class="d-inline delete-form"
                                                action="{{ route('ordenCompras.destroy', $ordenCompra) }}"
                                                method="POST">
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