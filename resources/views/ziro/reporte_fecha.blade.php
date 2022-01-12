@extends('adminlte::page')

@section('title', 'Reporte por Fecha')

@section('content_header')
    <div class="form-row">
        <div class="col-md-6"></div>
        <div class="col-md-6 col-xl-12">
            <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
                echo date('d/m/Y');
            @endphp</h5>
        </div>
    </div>
    <h1>Reporte de ventas por fecha</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-12 text-right pr-5">
                    <span>Total de ingresos: <b> </b></span>
                    <div class="form-group">
                        <strong>Bs/ {{ number_format($total, 2) }}</strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    {!! Form::open(['route' => 'resultado.reporte', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <span>Seleccionar usuario</span>
                            <div class="form-group">
                                <select class="form-control" name="usuario" id="usuario">
                                    <option value="0">Todos</option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-md-12">
                            <span>Fecha inicial</span>
                            <div class="form-group">
                                <input class="form-control" type="date" value="{{ old('fecha_ini') }}" name="fecha_ini"
                                    id="fecha_ini">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <span>Fecha final</span>
                            <div class="form-group">
                                <input class="form-control" type="date" value="{{ old('fecha_fin') }}" name="fecha_fin"
                                    id="fecha_fin">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 text-center">
                            <div class="form-group">
                                <button type="submit" id="consultar" class="btn btn-primary btn-sm btn-block">Consultar <i
                                        class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <a href="{{ url('reporte.pdf_fecha'.'/'.$id . '/' . $inicio . '/' . $fin) }}"
                                    class="btn btn-danger btn-sm btn-block {{ count($data) < 1 ? 'disabled' : '' }}"
                                    target="_blank">
                                    Exportar reporte a PDF <i class="fas fa-file-pdf"></i></a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="table-responsive">
                        <table id="order-listing" class="table table-striped mt-0.5 table-bordered shadow-lg mt-4">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Usuario</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dat)
                                    <tr>
                                        <td><strong>{{$dat->id}}</strong></td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($dat->fecha_venta)->format('d-M-y H:i a') }}
                                        </td>
                                        <td>Bs {{ number_format($dat->total, 2) }}</td>
                                        <td>{{ $dat->estado }}</td>
                                        <td>{{ $dat->user }}</td>
                                        <td style="width: 50px;">
                                            {{-- @can('ventas.pdf')
                                                 <a href="{{ route('ventas.pdf', $venta) }}" class="btn btn-danger" target="_blank">
                                    Imprimir <i class="far fa-file-pdf"></i></a> 
                                            @endcan --}}

                                            @can('ventas.show')
                                                <a href="{{ route('admin.ventas.show', $dat) }}" class="btn btn-info"><i
                                                        class="far fa-eye"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@stop

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/responsive.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('#order-listing').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registro por página",
                    "zeroRecords": "No se encontro registro",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "search": "Buscar",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    },
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)"
                },
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ]

            });
        });
    </script>
    <script>
        window.onload = function() {
            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth() + 1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var ano = fecha.getFullYear(); //obteniendo año
            if (dia < 10)
                dia = '0' + dia; //agrega cero si el menor de 10
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10
            document.getElementById('fecha_fin').value = ano + "-" + mes + "-" + dia;
        }
    </script>

@stop
