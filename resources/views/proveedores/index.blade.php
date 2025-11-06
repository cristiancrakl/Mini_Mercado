@extends('layouts.app')

@section('title','Listado De Proveedores')

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
                            <a href="{{ route('proveedores.create') }}" class="btn btn-primary float-right"
                                title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th>Nombre</th>
                                        <th>Numero Documento</th>
                                        <th>Tipo Documento</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th width="60px">Estado</th>
                                        <th width="90px">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proveedores as $proveedor)
                                    <tr>
                                        <td>{{ $proveedor->id }}</td>
                                        <td>{{ $proveedor->nombre }}</td>
                                        <td>{{ $proveedor->numero_documento }}</td>
                                        <td>{{ $proveedor->tipo_documento }}</td>
                                        <td>{{ $proveedor->direccion }}</td>
                                        <td>{{ $proveedor->telefono }}</td>
                                        <td>{{ $proveedor->email }}</td>
                                        <td>
                                            <input data-type="proveedor" data-id="{{$proveedor->id}}"
                                                data-url="{{ route('cambioestadoProveedor') }}" class="toggle-class"
                                                type="checkbox" data-toggle="switch" data-on-text="Activo"
                                                data-off-text="Inactivo" data-on-color="success" data-off-color="danger"
                                                {{ $proveedor->estado ? 'checked' : '' }}>
                                        </td>
                                        <td>

                                            <a href="{{ route('proveedores.edit',$proveedor->id) }}"
                                                class="btn btn-info btn-sm" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form class="d-inline delete-form"
                                                action="{{ route('proveedores.destroy', $proveedor) }}" method="POST">
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