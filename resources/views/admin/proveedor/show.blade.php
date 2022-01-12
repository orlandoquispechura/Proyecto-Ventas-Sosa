@extends('adminlte::page')

@section('title', 'Información del Proveedor')

@section('content_header')
<div class="form-row">
    <div class="col-md-6"></div>
    <div class="col-md-6 col-xl-12">
        <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
            echo date('d/m/Y');
        @endphp</h5>
    </div>
</div>
    <h1>Información del proveedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="border-bottom text-center pb-4">
                        <h3>{{ ucwords($proveedor->razon_social) }}</h3>
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="border-bottom py-4">
                        <div class="list-group">
                            <button type="button" class="list-group-item list-group-item-action active">
                                Sobre el proveedor
                            </button>
                            <button type="button" class="list-group-item list-group-item-action">Artículos</button>
                            @can('articulos.create')
                                <a href="{{ route('admin.articulos.create') }}"
                                    class="list-group-item list-group-item-action">Registrar artículo </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-lg-5">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Información de proveedor</h4>
                        </div>
                    </div>
                    <div class="profile-feed">
                        <div class="d-flex align-items-start profile-feed-item">
                            <div class="form-group col-md-6">
                                <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                <p class="text-muted">
                                    {{ ucwords($proveedor->razon_social) }}
                                </p>
                                <hr>
                                <strong><i class="fas fa-address-card mr-1"></i> Numero de NIT</strong>
                                <p class="text-muted">
                                    {{ $proveedor->nit }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fas fa-phone-square mr-1"></i>
                                    Teléfono</strong>
                                <p class="text-muted">
                                    {{ $proveedor->telefono }}
                                </p>
                                <hr>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="fas fa-mobile mr-1"></i>
                                    Celular</strong>
                                <p class="text-muted">
                                    {{ $proveedor->celular }}
                                </p>
                                <hr>
                                <strong><i class="fas fa-envelope mr-1"></i> Correo</strong>
                                <p class="text-muted">
                                    {{ $proveedor->email }}
                                </p>
                                <hr>
                                <strong><i class="fas fa-map-marked-alt mr-1"></i> Dirección</strong>
                                <p class="text-muted">
                                    {{ ucwords($proveedor->direccion) }}
                                </p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="{{ route('admin.proveedors.index') }}" class="btn btn-primary float-right">Regresar</a>
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
