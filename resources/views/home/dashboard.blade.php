@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="form-row">
        <div class="col-md-6"></div>
        <div class="col-md-6 col-xl-12">
            <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
                echo date('d/m/Y');
            @endphp</h5>
        </div>
    </div>
    <h1>Gráfico de ventas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card text-white bg-info">
                        @if (!empty($comprasmes))
                            @foreach ($comprasmes as $total)
                                <div class="card-body pb-0">
                                    <div class="float-right">
                                        <i class="fas fa-cart-arrow-down fa-4x"></i>
                                    </div>
                                    <div class="text-value h4"><strong>Bs. {{ number_format($total->totalmes, 2) }} (MES
                                            ACTUAL)</strong>
                                    </div>
                                    <div class="h3">Compras</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                    <a href="{{ route('admin.compras.index') }}" class="small-box-footer h4">Compras <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body pb-0">
                                <div class="float-right">
                                    <i class="fas fa-cart-arrow-down fa-4x"></i>
                                </div>
                                <div class="text-value h4"><strong>Bs. 0,00 (MES
                                        ACTUAL)</strong>
                                </div>
                                <div class="h3">Compras</div>
                            </div>
                            <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                <a href="{{ route('admin.compras.index') }}" class="small-box-footer h4">Compras <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card  text-white bg-success">
                        @if (!empty($ventasmes))
                            @foreach ($ventasmes as $total)
                                <div class="card-body pb-0">
                                    <div class="float-right">
                                        <i class="fas fa-cash-register fa-4x"></i>
                                    </div>
                                    <div class="text-value h4"><strong>Bs. {{ number_format($total->totalmes, 2) }} (MES
                                            ACTUAL) </strong>
                                    </div>
                                    <div class="h3">Ventas</div>
                                </div>

                                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                    <a href="{{ route('admin.ventas.index') }}" class="small-box-footer h4">Ventas <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body pb-0">
                                <div class="float-right">
                                    <i class="fas fa-cart-arrow-down fa-4x"></i>
                                </div>
                                <div class="text-value h4"><strong>Bs. 0,00 (MES
                                        ACTUAL)</strong>
                                </div>
                                <div class="h3">Ventas</div>
                            </div>
                            <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                <a href="{{ route('admin.ventas.index') }}" class="small-box-footer h4">Ventas <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fas fa-gift"></i>
                                Ventas diarias
                            </h4>
                            <canvas id="ventas_diarias" height="100"></canvas>
                            <div id="orders-chart-legend" class="orders-chart-legend"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fas fa-chart-line"></i>
                                Compras - Meses
                            </h4>
                            <canvas id="compras"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fas fa-chart-line"></i>
                                Ventas - Meses
                            </h4>
                            <canvas id="ventas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fas fa-couch"></i>
                                Productos más vendidos
                            </h4>
                            <div class="table-responsive ">
                                <table class="table table-striped mt-0.5 table-bordered shadow-lg mt-4">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th>Nombre</th>
                                            <th>Código</th>
                                            <th>Stock</th>
                                            <th>Cantidad vendida</th>
                                            <th>Ver detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productosvendidos as $productosvendido)
                                            <tr>
                                                <td>{{ $productosvendido->id }}</td>
                                                <td>{{ Str::ucfirst($productosvendido->nombre) }}</td>
                                                <td>{{ $productosvendido->codigo }}</td>
                                                <td><strong>{{ $productosvendido->stock }}</strong> Unidades</td>
                                                <td><strong>{{ $productosvendido->cantidad }}</strong> Unidades</td>
                                                <td>
                                                    @can('articulos.show')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.articulos.show', $productosvendido->id) }}">
                                                            Ver <i class="far fa-eye"></i>
                                                        </a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {!! Html::script('melody/js/data-table.js') !!}
    {!! Html::script('melody/js/chart.js') !!}

    <script>
        $(function() {
            var varCompra = document.getElementById('compras').getContext('2d');
            var charCompra = new Chart(varCompra, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg) {
    setlocale(LC_ALL, 'es_RB', 'Spanish_Bolivia', 'Bolivia');
    $mes_traducido = strftime('%B', strtotime($reg->mes));
    echo '"' . $mes_traducido . '",';
} ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg) {
    echo '' . $reg->totalmes . ',';
} ?>],
                        backgroundColor: '#17a2b8',
                        borderColor: '#17a2b8',
                        borderWidth: 3
                    }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var varVenta = document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg) {
    setlocale(LC_TIME, 'es_ES', 'Spanish_Bolivia', 'Bolivia');
    $mes_traducido = strftime('%B', strtotime($reg->mes));

    echo '"' . $mes_traducido . '",';
} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg) {
    echo '' . $reg->totalmes . ',';
} ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                    }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var varVenta = document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia) {
    $dia = $ventadia->dia;
    echo '"' . $dia . '",';
} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg) {
    echo '' . $reg->totaldia . ',';
} ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                },
            });
        });
    </script>

@stop
