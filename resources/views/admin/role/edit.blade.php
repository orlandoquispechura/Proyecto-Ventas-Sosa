@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1 class="text-bold">Editar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Editar rol</h4>
            </div>
            {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PUT']) !!}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $role->name) }}">
                @if ($errors->has('name'))
                    <span class="error text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" id="description"
                    rows="3">{{ old('description', $role->description) }}</textarea>
                @if ($errors->has('description'))
                    <span class="error text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            @include('admin.role._form')

            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
            {!! Form::close() !!}
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
