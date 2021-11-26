@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1 class="text-bold">Editar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-title mb-2 bg-danger text-white">
            <h6 class="pl-3 text-justify">
                La contraseña debera cumplir con los siguientes requisitos: 
            </h6>
            <h6 class="pl-3 text-justify">
                - al menos 1 caracter @$!%*#?&
            </h6>
            <h6 class="pl-3 text-justify">
                - al menos 1 letra mayúscula y  minúscula
            </h6>
            <h6 class="pl-3 text-justify">
                - al menos 1 dígito números del 0-9
            </h6>

        </div>
        <div class="card-body">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}

            <div class="form-group">
                <label for="name" class="text-primary">Nombre: </label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control"
                    required aria-describedby="helpId">
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('name') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email" class="text-primary">Correo electrónico: </label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control"
                    required aria-describedby="helpId">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="password" class="text-blue">Contraseña: </label>
                <input type="password" name="password" id="password" class="form-control" aria-describedby="helpId" placeholder="$Ejemplo&1">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('password') }}</span>
                    </div>
                @endif
            </div>
            @include('admin.user._form')
            <button type="submit" class="btn btn-success mr-2">Actualizar</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')
@stop
