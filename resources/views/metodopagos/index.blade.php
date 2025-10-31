@extends('layouts.app')

@section('title','Listado De Metodos de Pago')

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
                            @can('metodo_pagos.create')
                            <a href="{{ route('metodo_pagos.create') }}" class="btn btn-primary float-right"
                                title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th width="60px">Estado</th>
                                        <th width="90px">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($metodoPagos as $metodoPago)
                                    <tr>
                                        <td>{{ $metodoPago->id }}</td>
                                        <td>{{ $metodoPago->nombre }}</td>
                                        <td>{{ $metodoPago->descripcion }}</td>
                                        <td>
                                            {{ $metodoPago->estado ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td>
                                            <input data-type="metodopago" data-id="{{$metodoPago->id}}"
                                                data-url="{{ route('cambioestadoMetodoPago') }}" class="toggle-class"
                                                type="checkbox" data-toggle="switch" data-on-text="Activo"
                                                data-off-text="Inactivo" data-on-color="success" data-off-color="danger"
                                                {{ $metodoPago->estado ? 'checked' : '' }}>
                                            @can('metodo_pagos.edit')
                                            <a href="{{ route('metodo_pagos.edit',$metodoPago->id) }}"
                                                class="btn btn-info btn-sm" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('metodo_pagos.destroy')
                                            <form class="d-inline delete-form"
                                                action="{{ route('metodo_pagos.destroy', $metodoPago) }}" method="POST">
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