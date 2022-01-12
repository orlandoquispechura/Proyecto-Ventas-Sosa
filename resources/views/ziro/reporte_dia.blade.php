@extends('adminlte::page')

@section('title', 'Reporte de ventas')

@section('content_header')
<div class="form-row">
    <div class="col-md-6"></div>
    <div class="col-md-6 col-xl-12">
        <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
            echo date('d/m/Y');
        @endphp</h5>
    </div>
</div>
    <h1>Reporte por día</h1>
@stop

@section('content')
   <div class="form-group mb-2">
    <a href="{{route('reporte.pdf_dia')}}" class="btn btn-danger " target="_blank">Exportar a PDF   <i class="fas fa-file-pdf"></i> </a>
   </div>
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
                        <strong>Bs/ {{ $total }}</strong>
                    </div>
                </div>
            </div>
            <table id="order-listing" class="table table-striped mt-0.5 table-bordered shadow-lg mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Total</th>
                        <th scope="col">Estado</th>
                        <th scope="col" style="width:50px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <th scope="row">
                                {{ $venta->id }}
                            </th>
                            <td>
                                {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d M y h:i a') }}
                            </td>
                            <td>{{ $venta->total }}</td>
                            <td>{{ $venta->estado }}</td>
                            <td style="width: 210px;">
                                @can('ventas.pdf')
                                <a href="{{ route('ventas.pdf', $venta) }}" class="btn btn-danger" target="_blank">
                                    Imprimir <i class="far fa-file-pdf"></i></a>
                                @endcan

                                @can('ventas.show')
                                <a href="{{ route('admin.ventas.show', $venta) }}" class="btn btn-info"> Ver <i
                                    class="far fa-eye"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

@stop
