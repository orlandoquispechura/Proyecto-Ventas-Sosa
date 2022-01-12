@extends('adminlte::page')

@section('title', 'Categoría')

@section('content_header')
<div class="form-row">
    <div class="col-md-6"></div>
    <div class="col-md-6 col-xl-12">
        <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
            echo date('d/m/Y');
        @endphp</h5>
    </div>
</div>
    <h1>Editar Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria], 'method' => 'POST']) !!}
            @csrf
            {{ @method_field('PATCH') }}
            <div class="form-group">
                <label for="nombre" >Nombre Categoría: </label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre) }}"
                    class="form-control" tabindex="1" autofocus>
                @if ($errors->has('nombre'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('nombre') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción: </label>
                <textarea name="descripcion" id="descripcion" class="form-control"
                    tabindex="2">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                @if ($errors->has('descripcion'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('descripcion') }}</span>
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success mr-2 " tabindex="3">Actualizar </button>
            <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>

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
