@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
<div class="form-row">
    <div class="col-md-6"></div>
    <div class="col-md-6 col-xl-12">
        <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
            echo date('d/m/Y');
        @endphp</h5>
    </div>
</div>
    <h1>Editar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Editar rol</h4>
            </div>
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}
            <div class="form-group">
                <label for="name">Nombre: </label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $role->name) }}" autofocus>
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('name') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Descripción: </label>
                <textarea class="form-control" name="description" id="description"
                    rows="3">{{ old('description', $role->description) }}</textarea>
                @if ($errors->has('description'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('description') }}</span>
                    </div>
                @endif
            </div>

            @include('admin.role._form')

            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
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
