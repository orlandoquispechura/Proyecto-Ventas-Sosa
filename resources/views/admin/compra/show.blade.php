@extends('adminlte::page')

@section('title', 'Detalles de Compra')

@section('content_header')
    <h1 class="text-bold">Compras</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- <div id="logo">
                <img src="uploads/1628106188_perfil.png" alt="logo-empresa" id="imagen">
            </div> --}}
            <div class="form-group row">
                <div class="col-md-4 text-center">
                    <label class="form-control-label" for="nombre"><strong>Proveedor</strong></label>
                    <p>{{ ucwords($compra->proveedor->razon_social) }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label" for="num_compra"><strong>Número Compra</strong></label>
                    <p>{{ $compra->id }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label" for="num_compra"><strong>Comprador</strong></label>
                    <p>{{ ucwords($compra->user->name) }}</p>
                </div>
            </div>
            <br /><br />
            <div class="form-group row ">
                <h4 class="card-title ml-3 text-bold">Detalles de compra</h4>
                <div class="table-responsive col-md-12 table-bordered shadow-lg">
                    <table id="detalles" class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Producto</th>
                                <th>Precio (Bs)</th>
                                <th>Cantidad</th>
                                <th>SubTotal (Bs)</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="3">
                                    <p align="right">SUBTOTAL:</p>
                                </th>
                                <th>
                                    <p align="right">s/{{ number_format($subtotal, 2) }}</p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">
                                    <p align="right">TOTAL IMPUESTO ({{ $compra->impuesto }}%):</p>
                                </th>
                                <th>
                                    <p align="right">s/{{ number_format(($subtotal * $compra->impuesto) / 100, 2) }}</p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="right">s/{{ number_format($compra->total, 2) }}</p>
                                </th>
                            </tr>

                        </tfoot>
                        <tbody>
                            @foreach ($detallecompras as $detallecompra)
                                <tr>
                                    <td>{{ ucwords($detallecompra->articulo->nombre) }}</td>
                                    <td>{{ $detallecompra->precio_compra }}</td>
                                    <td>{{ $detallecompra->cantidad }}</td>
                                    <td>{{ number_format($detallecompra->cantidad * $detallecompra->precio_compra, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
        <div class="card-footer text-muted">
            <a href="{{ route('compras.index') }}" class="btn btn-primary float-right">Regresar</a>
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
@stop
