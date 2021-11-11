@extends('adminlte::page')

@section('title', 'Registrar Usuario')

@section('content_header')
    <h1 class="text-bold">Registrar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}

            <div class="form-group">
                <label for="name" class="text-blue">Nombre</label>
                <input type="text" name="name" id="name" class="form-control"  value="{{old('name')}}" autofocus >
                @if ($errors->has('name'))
                <span class="error text-danger">{{ $errors->first('name') }}</span>
            @endif
            </div>
              <div class="form-group">
                <label for="email"class="text-blue">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                @if ($errors->has('email'))
                <span class="error text-danger">{{ $errors->first('email') }}</span>
            @endif  
            </div>
              
              <div class="form-group">
                  <label for="password" class="text-blue">Contraseña</label>
                  <input type="password" name="password" id="password" class="form-control"  aria-describedby="helpId">
                  @if ($errors->has('password'))
                  <span class="error text-danger">{{ $errors->first('password') }}</span>
              @endif
                </div>

            @include('admin.user._form')
             <button type="submit" class="btn btn-success mr-2">Registrar</button>
             <a href="{{route('users.index')}}" class="btn btn-secondary">
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