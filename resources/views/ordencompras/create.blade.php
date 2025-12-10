@extends('layouts.app')

@section('title','Crear OrdenCompra')

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('ordenCompras.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">

                                            <label class="control-label">Proveedor<strong
                                                    style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="proveedores_id">
                                                <option value="">Seleccione un proveedor</option>
                                                @foreach($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}" {{ old('proveedores_id') == $proveedor->id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                                                @endforeach
                                            </select>

                                            <div class="form-row">

                                                <div class="form-group col-md-4 ">
                                                    <label class="control-label">Numero de orden<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        name="numero_orden" placeholder="Por ejemplo, 1500"
                                                        value="{{ old('numero_orden') }}">
                                                </div>

                                                <div class="form-group col-md-4 ">
                                                    <label class="control-label">total<strong
                                                            style="color:red;">(*)</strong></label>
                                                    <input type="text" class="form-control" name="total"
                                                        value="{{ old('total') }}" placeholder="Por ejemplo, 600"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="estado" value="1">
                                <input type="hidden" class="form-control" name="registrado_por"
                                    value="{{ Auth::user()->id }}">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('ordenCompras.index') }}"
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