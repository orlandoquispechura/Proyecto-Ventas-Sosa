@extends('adminlte::page')

@section('title', 'Información del cliente')

@section('content_header')
<div class="form-row">
    <div class="col-md-6"></div>
    <div class="col-md-6 col-xl-12">
        <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
            echo date('d/m/Y');
        @endphp</h5>
    </div>
</div>
    <h1>Información del cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="border-bottom text-center pb-4">
                        <h3>{{ ucwords($cliente->nombre) }} {{ucwords($cliente->apellido_paterno)}}</h3>
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="border-bottom py-4">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                                href="#list-home" role="tab" aria-controls="home">
                                Sobre cliente
                            </a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#list-profile" role="tab" aria-controls="profile">
                                Historial de compras
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-lg-5">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" user="tabpanel"
                            aria-labelledby="list-home-list">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de cliente</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                        <p class="text-muted">
                                            {{ ucwords($cliente->nombre) }} {{ucwords($cliente->apellido_paterno)}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-address-card mr-1"></i> Numero de DNI</strong>
                                        <p class="text-muted">
                                            {{ $cliente->dni }}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-map-marked-alt mr-1"></i>
                                            Dirección</strong>
                                        <p class="text-muted">
                                            {{ $cliente->direccion }}
                                        </p>
                                        <hr>
                                    </div>

                                    <div class="form-group col-md-6">
                                       
                                        <strong><i class="fas fa-phone-square mr-1"></i> Teléfono</strong>
                                        <p class="text-muted">
                                            {{ $cliente->telefono }}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-mobile mr-1"></i> Celular</strong>
                                        <p class="text-muted">
                                            {{ $cliente->celular }}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-map-envelope-alt mr-1"></i> Correo electrónico</strong>
                                        <p class="text-muted">
                                            {{ $cliente->email }}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="list-profile" user="tabpanel" aria-labelledby="list-profile-list">


                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Historial de compras</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="table-responsive">
                                        <table id="order-listing"
                                            class="table table-striped table-bordered shadow-lg mt-4 dt-responsive nowrap cliente">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Total</th>
                                                    <th>Estado</th>
                                                    <th style="width:50px; text-align: right;">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cliente->ventas as $venta)
                                                    <tr>
                                                        <td>{{ $venta->fecha_venta }}</td>
                                                        <td>{{ $venta->total }}</td>

                                                        @if ($venta->estado == 'VALIDO')
                                                            <td>
                                                                <a class="jsgrid-button btn btn-success"
                                                                    href="{{ route('cambio.estado.ventas', $venta) }}"
                                                                    title="Editar">
                                                                    Activo <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a class="jsgrid-button btn btn-danger"
                                                                    href="{{ route('cambio.estado.ventas', $venta) }}"
                                                                    title="Editar">
                                                                    Cancelado <i class="fas fa-times"></i>
                                                                </a>
                                                            </td>
                                                        @endif
                                                        <td style="width: 230px; text-align: right">
                                                            @can('ventas.pdf')
                                                                <a href="{{ route('ventas.pdf', $venta) }}"
                                                                    class="btn btn-danger">Imprimir <i
                                                                        class="far fa-file-pdf"></i></a>
                                                            @endcan
                                                            @can('ventas.show')
                                                                <a href="{{ route('admin.ventas.show', $venta) }}"
                                                                    class="btn btn-info">Ver <i
                                                                        class="far fa-eye"></i></a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2"><strong>Total de monto comprado: </strong></td>
                                                    <td colspan="3" align="left"><strong>Bs/{{ number_format($total_ventas, 2) }}</strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="{{ route('admin.clientes.index') }}" class="btn btn-primary float-right">Regresar</a>
        </div>
    </div>
    <br><br><br>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>

    <script>
        $('.eliminar-form').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Quieres eliminar?',
                text: "El registro se eliminara definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
    @if (session('delete') == 'ok')
        <script>
            Swal.fire(
                'Eliminar!',
                'Se Eliminó el registro.',
                'warning'
            )
        </script>
    @endif


    <script>
        $(document).ready(function() {
            $('.cliente').DataTable({
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
