@extends('adminlte::page')

@section('title', 'Categoría')

@section('content_header')
    <h1>Crear Categorías</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categorias.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre" class="text-blue">Nombre Categoría: </label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control"
                        tabindex="1" autofocus>
                    @if ($errors->has('nombre'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('nombre') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="descripcion" class="text-blue">Descripción: </label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripción solo 100 caracteres "
                        class="form-control" tabindex="2" >{{old('descripcion')}}</textarea>
                        @if ($errors->has('descripcion'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('descripcion') }}</span>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success  " tabindex="3">Guardar </button>
                <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary ml-2" tabindex="4">Cancelar</a>

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
