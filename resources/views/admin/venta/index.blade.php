@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Listado de Ventas</h1>
@stop

@section('content')
        <a class="btn btn-primary mb-2" href="{{ route('ventas.create') }}">+ Registrar Ventas</a>
    <div class="card">
        <div class="card-body">
            <table id="order-listing" class="table venta table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="">id Venta</th>
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
                                <a class="btn btn-info" href="{{route('ventas.show', $venta)}}">{{$venta->id}}</a>
                            </th>
                            <td>
                                {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d M y h:i a') }}
                            </td>
                            <td>{{ $venta->total }}</td>

                            @if ($venta->estado == 'VALIDO')
                                <td>
                                    <a class="jsgrid-button btn btn-success"
                                        href="{{ route('cambio.estado.ventas', $venta) }}" title="Editar">
                                        Activo <i class="fas fa-check"></i>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a class="jsgrid-button btn btn-danger"
                                        href="{{ route('cambio.estado.ventas', $venta) }}" title="Editar">
                                        Cancelado <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            @endif
                            <td style="width: 50px;">
                                <a href="{{route('ventas.pdf', $venta)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                {{--<a href="{{route('ventas.print', $venta)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>--}}
                                <a href="{{route('ventas.show', $venta)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/responsive.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('.venta').DataTable({
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
