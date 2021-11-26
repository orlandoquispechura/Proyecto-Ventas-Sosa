@extends('adminlte::page')

@section('title', 'Categoría')

@section('content_header')
    <h1>Reporte de ventas </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'resultado.reporte', 'method' => 'POST']) !!}
            <div class="row ">
                <div class="col-12 col-md-3">
                    <span>Fecha inicial</span>
                    <div class="form-group">
                        <input class="form-control" type="date" value="{{ old('fecha_ini') }}" name="fecha_ini"
                            id="fecha_ini">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <span>Fecha final</span>
                    <div class="form-group">
                        <input class="form-control" type="date" value="{{ old('fecha_fin') }}" name="fecha_fin"
                            id="fecha_fin">
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center mt-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                    </div>
                </div>

                <div class="col-12 col-md-3 text-center">
                    <span>Total de ingresos: <b> </b></span>
                    <div class="form-group">
                        <strong>s/ {{ $total }}</strong>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

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

                                    <a href="{{ route('ventas.pdf', $venta) }}"
                                        class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                    {{-- <a href="{{ route('ventas.print', $venta) }}"
                                        class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a> --}}
                                    <a href="{{ route('admin.ventas.show', $venta) }}"
                                        class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
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
