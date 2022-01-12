@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Reporte de ventas </h1>
@stop

@section('content')
    @livewire('reportes-controller')
    <h1>reporte de ventas</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    {{-- @livewireStyles --}}
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- @livewireScripts --}}

@stop
