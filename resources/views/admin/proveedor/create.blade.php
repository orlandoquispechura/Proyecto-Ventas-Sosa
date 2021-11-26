@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content_header')
    <h1>Crear Proveedor</h1>
@stop

@section('content')
    <div class="card ">
        <div class="card-body">
            <form action="{{ route('admin.proveedors.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="razon_social" class="text-blue">Nombre Proveedor: </label>
                    <input type="text" name="razon_social" id="razon_social" value="{{ old('razon_social') }}"
                        class="form-control" tabindex="1" autofocus>
                    @if ($errors->has('razon_social'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('razon_social') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nit" class="text-blue">Nº Nit: </label>
                    <input type="text" name="nit" id="nit" min="0" value="{{ old('nit') }}" class="form-control"
                        tabindex="2">
                    @if ($errors->has('nit'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('nit') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="text-blue">Email: </label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control"
                        tabindex="3">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="direccion" class="text-blue">Dirección: </label>
                    <textarea name="direccion" id="direccion" value="{{ old('direccion') }}" class="form-control"
                        tabindex="4"></textarea>
                    @if ($errors->has('direccion'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="telefono" class="text-blue">Teléfono: </label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control"
                        tabindex="5">
                    @if ($errors->has('telefono'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success" tabindex="6">Guardar </button>
                <a href="{{ route('admin.proveedors.index') }}" class="btn btn-secondary ml-2" tabindex="7">Cancelar</a>
        </div>
        </form>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')

@stop
