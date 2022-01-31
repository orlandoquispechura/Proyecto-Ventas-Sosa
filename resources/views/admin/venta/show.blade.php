@extends('adminlte::page')

@section('title', 'Detalles de Venta')

@section('content_header')
<div class="form-row">
    <div class="col-md-6"></div>
    <div class="col-md-6 col-xl-12">
        <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
            echo date('d/m/Y');
        @endphp</h5>
    </div>
</div>
    <h1>Detalle de venta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-4 text-center">
                    <label class="form-control-label "><strong>Cliente</strong></label>
                    <p>{{ucwords($venta->cliente->nombre)}} {{ucwords($venta->cliente->apellido_paterno)}}</p>
                    
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label"><strong>Número Venta</strong></label>
                    <p>{{$venta->id}}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label"><strong>Vendedor</strong></label>
                    <p>{{Str::ucfirst($venta->user->name)}}</p>
                </div>
            </div>
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
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="left">Bs. {{number_format($venta->total,2)}}</p>
                                </th>
                            </tr>

                        </tfoot>
                        <tbody>
                            @foreach($detalleventas as $detalleventa)
                            <tr>
                                <td>{{ucwords($detalleventa->articulo->nombre)}}</td>
                                <td>Bs. {{$detalleventa->precio_venta}}</td>
                                <td>{{$detalleventa->descuento}} %</td>
                                <td>{{$detalleventa->cantidad}}</td>
                                <td align="left">Bs. {{number_format($detalleventa->cantidad*$detalleventa->precio_venta - $detalleventa->cantidad*$detalleventa->precio_venta*$detalleventa->descuento/100,2)}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="{{route('admin.ventas.index')}}" class="btn btn-primary float-right">Regresar</a>
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
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@stop

@section('js')
  
@stop