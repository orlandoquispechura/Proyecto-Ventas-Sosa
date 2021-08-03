@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
<h1>Crear Cliente</h1>
@stop

@section('content')
<div class="card ">
    <div class="card-body">
        <form action="{{url('/clientes')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="razon_social" class="text-blue">Nombre Cliente: </label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre')}}" class="form-control" tabindex="1" autofocus required>
                @if($errors->has('nombre'))
                <span class="error text-danger">{{ $errors->first('nombre') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="apellido_paterno" class="text-blue">Apellido Paterno: </label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ old('apellido_paterno')}}" class="form-control" tabindex="2" autofocus required>
                @if($errors->has('apellido_paterno'))
                <span class="error text-danger">{{ $errors->first('apellido_paterno') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="apellido_materno" class="text-blue">Apellido Materno: </label>
                <input type="text" name="apellido_materno" id="apellido_materno" value="{{ old('apellido_materno')}}" class="form-control" tabindex="3">
                @if($errors->has('apellido_materno'))
                <span class="error text-danger">{{ $errors->first('apellido_materno') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="dni" class="text-blue">Dni: </label>
                <input type="number" name="dni" id="dni" value="{{old('dni')}}" class="form-control" tabindex="4" required>
                @if($errors->has('dni'))
                    <span class="error text-danger">{{$errors->first('dni')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="direccion" class="text-blue">Dirección: </label>
                <textarea name="direccion" id="direccion" value="{{ old('direccion')}}" class="form-control" tabindex="4"></textarea>
                @if($errors->has('direccion'))
                <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="telefono" class="text-blue">Teléfono: </label>
                <input type="text" name="telefono" id="telefono" value="{{ old('telefono')}}" class="form-control" tabindex="5">
                @if($errors->has('telefono'))
                <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email" class="text-blue">Email: </label>
                <input type="text" name="email" id="email" value="{{ old('email')}}" class="form-control" tabindex="6">
                @if($errors->has('email'))
                <span class="error text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-success" tabindex="7">Guardar </button>
            <a href="{{route('clientes.index')}}" class="btn btn-secondary ml-2" tabindex="8">Cancelar</a>
    </div>
    </form>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')

@stop