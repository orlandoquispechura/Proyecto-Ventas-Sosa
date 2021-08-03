@extends('adminlte::page')

@section('title', 'Detalles de Venta')

@section('content_header')
    <h1 class="text-bold">Ventas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-4 text-center">
                    <label class="form-control-label "><strong>Cliente</strong></label>
                    <p><a href="{{route('clientes.show', $venta->cliente)}}">{{$venta->cliente->nombre}}</a></p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label"><strong>Número Venta</strong></label>
                    <p>{{$venta->id}}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label"><strong>Vendedor</strong></label>
                    <p>{{$venta->user->name}}</p>
                </div>
            </div>
            <br /><br />
            <div class="form-group">
                <h4 class="card-title text-bold">Detalles de venta</h4>
                <div class="table-responsive col-md-12 table-bordered shadow-lg">
                    <table id="saleDetails" class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Artículo</th>
                                <th>Precio Venta (Bs)</th>
                                <th>Descuento(Bs)</th>
                                <th>Cantidad</th>
                                <th>SubTotal(Bs)</th>
                            </tr>
                        </thead>
                        <tfoot>

                            <tr>
                                <th colspan="4">
                                    <p align="right">SUBTOTAL:</p>
                                </th>
                                <th>
                                    <p align="right">s/{{number_format($subtotal,2)}}</p>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="4">
                                    <p align="right">TOTAL IMPUESTO ({{$venta->impuesto}}%):</p>
                                </th>
                                
                                <th>
                                    <p align="right">s/{{number_format($subtotal*$venta->impuesto/100,2)}}</p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="right">s/{{number_format($venta->total,2)}}</p>
                                </th>
                            </tr>

                        </tfoot>
                        <tbody>
                            @foreach($detalleventas as $detalleventa)
                            <tr>
                                <td>{{$detalleventa->articulo->nombre}}</td>
                                <td>s/ {{$detalleventa->precio_venta}}</td>
                                <td>{{$detalleventa->descuento}} %</td>
                                <td>{{$detalleventa->cantidad}}</td>
                                <td>s/{{number_format($detalleventa->cantidad*$detalleventa->precio_venta - $detalleventa->cantidad*$detalleventa->precio_venta*$detalleventa->descuento/100,2)}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="{{route('ventas.index')}}" class="btn btn-primary float-right">Regresar</a>
        </div>
    </div>
</div>
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