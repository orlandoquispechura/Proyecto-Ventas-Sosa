@extends('adminlte::page')

@section('title', 'Reporte de ventas')

@section('content_header')
<h1>Reporte de ventas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row ">
            <div class="col-12 col-md-4 text-center">
                <span>Fecha de consulta: <b> </b></span>
                <div class="form-group">
                    <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong>
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <span>Cantidad de registros: <b></b></span>
                <div class="form-group">
                    <strong>{{ $ventas->count() }}</strong>
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <span>Total de ingresos: <b> </b></span>
                <div class="form-group">
                    <strong>s/ {{ $total }}</strong>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th style="width:50px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('admin.ventas.show', $venta) }}">{{ $venta->id }}</a>
                        </th>
                        <td>
                            {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d M y h:i a') }}
                        </td>
                        <td>{{ $venta->total }}</td>
                        <td>{{ $venta->estado }}</td>
                        <td style="width: 50px;">
                            <a href="{{ route('ventas.pdf', $venta) }}" class="jsgrid-button jsgrid-edit-button"><i
                                    class="far fa-file-pdf"></i></a>
                            {{-- <a href="{{ route('ventas.print', $venta) }}" class="jsgrid-button jsgrid-edit-button"><i --}}
                                    {{-- class="fas fa-print"></i></a> --}}
                            <a href="{{ route('admin.ventas.show', $venta) }}" class="jsgrid-button jsgrid-edit-button"><i
                                    class="far fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
