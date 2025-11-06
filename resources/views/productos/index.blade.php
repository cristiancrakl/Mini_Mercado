@extends('layouts.app')

@section('title','Listado De Productos')

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
                            <a href="{{ route('productos.create') }}" class="btn btn-primary float-right"
                                title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th>Nombre</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th>Descripcion</th>
                                        <th>Unidad Medida</th>
                                        <th>Stock</th>
                                        <th>Stock Minimo</th>
                                        <th>Imagen</th>
                                        <th width="60px">Estado</th>
                                        <th width="90px">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->precio_compra }}</td>
                                        <td>{{ $producto->precio_venta }}</td>
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>{{ $producto->unidad_medida }}</td>
                                        <td>{{ $producto->stock }}</td>
                                        <td>{{ $producto->stock_minimo }}</td>
                                        <td>
                                            @if($producto->imagen)
                                            <img src="{{ asset('img/post/' . $producto->imagen) }}" alt="Imagen"
                                                width="50" height="50">
                                            @else
                                            Sin imagen
                                            @endif
                                        </td>
                                        <td>
                                            <input data-type="producto" data-id="{{$producto->id}}"
                                                data-url="{{ route('cambioestadoProducto') }}" class="toggle-class"
                                                type="checkbox" data-toggle="switch" data-on-text="Activo"
                                                data-off-text="Inactivo" data-on-color="success" data-off-color="danger"
                                                {{ $producto->estado ? 'checked' : '' }}>
                                        </td>
                                        <td>

                                            <a href="{{ route('productos.edit',$producto->id) }}"
                                                class="btn btn-info btn-sm" title="Editar"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form class="d-inline delete-form"
                                                action="{{ route('productos.destroy', $producto) }}" method="POST">
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