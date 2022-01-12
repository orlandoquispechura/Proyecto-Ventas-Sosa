@extends('adminlte::page')
@section('title', 'Error 500')

@section('content_header')
@stop
@section('content')
{{-- @section('message', __('No tiene persmisos ')) --}}

<div class="container">
    <div class="card">
        <h2 class="text-danger ml-2">Un problema en el servidor!!</h2>
        <div class="card-body mb-4">
           <div>
            <img class="mx-auto d-block img-fluid img-thumbnail" style="height: 300px; width: 500px" src="/img/500.png" alt="error_500.png">
           </div>
        </div>
    </div>
</div>
<br><br>
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
