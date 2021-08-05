@extends('adminlte::page')

@section('title', 'Información del Proveedor')

@section('content_header')
    <h1 class="text-bold"> Proveedor:</h1>
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
                            <button type="button" class="list-group-item list-group-item-action">Productos</button>
                                <a href="{{route('articulos.create')}}" class="list-group-item list-group-item-action" >Registrar </a>
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
                            </div>
                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="fas fa-mobile mr-1"></i>
                                    Teléfono</strong>
                                <p class="text-muted">
                                    {{ $proveedor->telefono }}
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
            <a href="{{ route('proveedors.index') }}" class="btn btn-primary float-right">Regresar</a>
        </div>
    </div>
    </div>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
