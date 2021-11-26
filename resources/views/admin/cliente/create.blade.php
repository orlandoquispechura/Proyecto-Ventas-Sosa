@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>Crear Cliente</h1>
@stop

@section('content')
    <div class="card ">
        <div class="card-body">
            <form action="{{ route('admin.clientes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="razon_social" class="text-blue">Nombre Cliente: </label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control"
                        tabindex="1" autofocus>
                    @if ($errors->has('nombre'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('nombre') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="apellido_paterno" class="text-blue">Apellido Paterno: </label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ old('apellido_paterno') }}"
                        class="form-control" tabindex="2" autofocus>
                    @if ($errors->has('apellido_paterno'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('apellido_paterno') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="apellido_materno" class="text-blue">Apellido Materno: </label>
                    <input type="text" name="apellido_materno" id="apellido_materno" value="{{ old('apellido_materno') }}"
                        class="form-control" tabindex="3">
                    @if ($errors->has('apellido_materno'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('apellido_materno') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="dni" class="text-blue">Dni: </label>
                    <input type="text" name="dni" id="dni" min="0" value="{{ old('dni') }}" class="form-control"
                        tabindex="4">
                    @if ($errors->has('dni'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('dni') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="direccion" class="text-blue">Dirección: </label>
                    <textarea name="direccion" id="direccion" class="form-control"
                        tabindex="5">{{ old('direccion') }}</textarea>
                    @if ($errors->has('direccion'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="telefono" class="text-blue">Teléfono: </label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control"
                        tabindex="6">
                    @if ($errors->has('telefono'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="text-blue">Email: </label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control"
                        tabindex="7">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success" tabindex="8">Guardar </button>
                <a href="{{ route('admin.clientes.index') }}" class="btn btn-secondary ml-2" tabindex="9">Cancelar</a>
            </form>
        </div>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')

@stop
