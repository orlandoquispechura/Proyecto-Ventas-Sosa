@extends('adminlte::page')

@section('title', 'Información de los Artículos')

@section('content_header')
    <h1>Información de los Artículos</h1>
@stop

@section('content')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$articulo->nombre}}</h3>
                                <img src="{{asset('storage'.'/'.$articulo->imagen)}}" alt="profile" width="150" />
                                
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoría
                                    </span>
                                    <span class="float-right">
                                        {{--  PRODUCTOS POR CATEGORIA  --}}
                                      <h3>{{$articulo->categoria->nombre}}</h3>
                                    </span>
                                    <hr>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del Artículo</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Código</strong>
                                        <p class="text-muted">
                                            {{$articulo->codigo}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Cantidad</strong>
                                        <p class="text-muted">
                                            {{$articulo->cantidad}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-mobile mr-1"></i>
                                            Precio de venta</strong>
                                        <p class="text-muted">
                                            {{$articulo->precio_venta}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i> Código de barras</strong>
                                        <p class="text-muted">
                                            {!!DNS1D::getBarcodeHTML($articulo->codigo, 'EAN13'); !!}
                                            <p class="text-muted">
                                                {{$articulo->codigo}}
                                            </p>
                                        </p>
                                       
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('admin.articulos.index')}}" class="btn btn-primary float-left">Regresar</a>
                </div>
            </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')
@stop