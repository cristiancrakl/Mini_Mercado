@extends('layouts.app')

@section('title','Listado De Clientes')

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
                            @can('clientes.create')
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary float-right"
                                title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th>Nombre</th>
                                        <th>Tipo Documento</th>
                                        <th>Numero documento</th>
                                        <th>Direccion</th>
                                        <th>Numero de telefono</th>
                                        <th>Email</th>
                                        <th width="60px">Estado</th>
                                        <th width="90px">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>{{ $cliente->tipo_documento }}</td>
                                        <td>{{ $cliente->numero_documento }}</td>
                                        <td>{{ $cliente->direccion }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>
                                            {{ $cliente->estado ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td>
                                            <input data-type="cliente" data-id="{{$cliente->id}}"
                                                data-url="{{ route('cambioestadoCliente') }}" class="toggle-class"
                                                type="checkbox" data-toggle="switch" data-on-text="Activo"
                                                data-off-text="Inactivo" data-on-color="success" data-off-color="danger"
                                                {{ $cliente->estado ? 'checked' : '' }}>
                                            <a href="{{ route('clientes.edit',$cliente->id) }}"
                                                class="btn btn-info btn-sm" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form class="d-inline delete-form"
                                                action="{{ route('clientes.destroy', $cliente) }}" method="POST">
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