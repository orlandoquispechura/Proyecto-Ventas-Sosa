@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content_header')
<div class="form-row">
    <div class="col-md-6"></div>
    <div class="col-md-6 col-xl-12">
        <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
            echo date('d/m/Y');
        @endphp</h5>
    </div>
</div>
    <h1>Editar Proveedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::model($proveedor, ['route' => ['admin.proveedors.update', $proveedor], 'method' => 'POST']) !!}
            @csrf
            {{ @method_field('PATCH') }}
            <div class="form-group">
                <label for="razon_social" class="text-blue">Nombre: </label>
                <input type="text" name="razon_social" id="razon_social"
                    value="{{ old('razon_social', $proveedor->razon_social) }}" class="form-control" tabindex="1"
                    required autofocus>
                @if ($errors->has('razon_social'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('razon_social') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="nit" class="text-blue">Nº Nit: </label>
                <input type="number" name="nit" id="nit" min="0" value="{{ old('nit', $proveedor->nit) }}"
                    class="form-control" tabindex="2">
                @if ($errors->has('nit'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('nit') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email" class="text-blue">Email: </label>
                <input type="email" name="email" id="email" value="{{ old('email', $proveedor->email) }}"
                    class="form-control" tabindex="3">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="direccion" class="text-blue">Dirección: </label>
                <textarea name="direccion" id="direccion" class="form-control"
                    tabindex="4">{{ old('direccion', $proveedor->direccion) }}</textarea>
                @if ($errors->has('direccion'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="telefono" class="text-blue">Teléfono: </label>
                <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $proveedor->telefono) }}"
                    class="form-control" tabindex="5">
                @if ($errors->has('telefono'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success mr-2 " tabindex="6">Actualizar </button>
            <a href="{{ route('admin.proveedors.index') }}" class="btn btn-secondary" tabindex="7">Cancelar</a>

            {!! Form::close() !!}
        </div>
    </div>
    <footer>
        <div class="row text-bold " style="color: rgb(135, 141, 153)">
            <div class="col-md-8">
                <p class="text-right">&copy; {{ date('Y') }} Sistema de Ventas SOSA</p>
            </div>
            <div class="col-md-4">
                <p class="text-right ">Versión 1.0.0</p>
            </div>
        </div>
    </footer>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')
@stop
