@extends('adminlte::page')

@section('title', 'Gestion de Empresa')

@section('content_header')
    <div class="form-row">
        <div class="col-md-6"></div>
        <div class="col-md-6 col-xl-12">
            <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
                echo date('d/m/Y');
            @endphp</h5>
        </div>
    </div>
    <h1>{{ $empresa->nombre_negocio }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title text-bold">Gestión de empresa</h4>
            </div>
            @if (session('update'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong> Editado!</strong> {{ session('update') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong><i class="fas fa-file-signature mr-1"></i> Nombre </strong>

                    <p class="text-muted">
                        {{ $empresa->nombre_negocio }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-align-left mr-1"></i> Descripción</strong>

                    <p class="text-muted">
                        {{ $empresa->descripcion }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-map-marked-alt mr-1"></i> Dirección</strong>

                    <p class="text-muted">
                        {{ $empresa->direccion }}
                    </p>
                    <hr>
                </div>
                <div class="form-group col-md-6">
                    <strong><i class="far fa-address-card mr-1"></i> NIT</strong>

                    <p class="text-muted">{{ $empresa->nit }}</p>
                    <hr>
                    <strong><i class="far fa-envelope mr-1"></i> Correo electrónico</strong>

                    <p class="text-muted">{{ $empresa->mail }}</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fas fa-exclamation-circle mr-1"></i> Logo</strong><br>
                        </div>
                        <div class="col-md-6">
                            @if (isset($empresa->logo))
                                <img src="{{ 'imagen' . '/' . $empresa->logo }}" width="250" alt="logo.png"
                                    class="mx-auto d-block">
                            @else
                                <img src="storage/uploads/logoempresa.png" alt="logo-defecto.png"
                                    width="250">
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            @can('empresas.edit')
                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
                    data-target="#exampleModal-2">Actualizar información de la empresa</button>
            @endcan
        </div>
        <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    {!! Form::model($empresa, ['route' => ['admin.empresa.update', $empresa], 'method' => 'PUT', 'files' => true]) !!}


                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre_negocio" class="text-primary">Nombre</label>
                            <input type="text" class="form-control" name="nombre_negocio" id="nombre_negocio"
                                value="{{ $empresa->nombre_negocio }}" aria-describedby="helpId">
                            @if ($errors->has('nombre_negocio'))
                                <div class="alert alert-danger">
                                    <span class="error text-danger">{{ $errors->first('nombre_negocio') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="text-primary">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion"
                                rows="3">{{ $empresa->descripcion }}</textarea>
                            @if ($errors->has('descripcion'))
                                <div class="alert alert-danger">
                                    <span class="error text-danger">{{ $errors->first('descripcion') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="mail" class="text-primary">Correo electrónico</label>
                            <input type="email" class="form-control" name="mail" id="mail" value="{{ $empresa->mail }}"
                                aria-describedby="helpId">
                            @if ($errors->has('mail'))
                                <div class="alert alert-danger">
                                    <span class="error text-danger">{{ $errors->first('mail') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="text-primary">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion"
                                value="{{ $empresa->direccion }}" aria-describedby="helpId">
                            @if ($errors->has('direccion'))
                                <div class="alert alert-danger">
                                    <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nit" class="text-primary">Numero de NIT</label>
                            <input type="text" class="form-control" name="nit" id="nit" value="{{ $empresa->nit }}"
                                aria-describedby="helpId">
                            @if ($errors->has('nit'))
                                <div class="alert alert-danger">
                                    <span class="error text-danger">{{ $errors->first('nit') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="logo" class="text-primary">Logo</label><br>
                            <img src="{{ 'imagen' . '/' . $empresa->logo }}" width="150" alt="logo.png"
                                class="mb-5 mx-auto d-block">
                            <input type="file" name="logo" id="logo" class="form-control">
                            @if ($errors->has('logo'))
                                <span class="error text-danger">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>

                    {!! Form::close() !!}

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

@stop
