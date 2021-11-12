@extends('adminlte::page')

@section('title', 'Gestion de Empresa')

@section('content_header')
    <h1 class="text-bold">{{ $empresa->nombre_negocio }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title text-bold">Gestión de empresa</h4>
            </div>
            @if(session('update'))
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
                    <strong><i class="far fa-address-card mr-1"></i> RUC</strong>

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
                            <img style="width:150px ; height:150px ;" src="{{ 'imagen/' . $empresa->logo }}"
                                class="rounded float-left" alt="logo">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
                data-target="#exampleModal-2">Actualizar</button>
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
                            <label for="nombre_negocio">Nombre</label>
                            <input type="text" class="form-control" name="nombre_negocio" id="nombre_negocio"
                                value="{{ $empresa->nombre_negocio }}" aria-describedby="helpId">
                        </div>
                        @if ($errors->has('nombre_negocio'))
                            <span class="error text-danger">{{ $errors->first('nombre_negocio') }}</span>
                        @endif

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion"
                                rows="3">{{ $empresa->descripcion }}</textarea>
                        </div>
                        @if ($errors->has('descripcion'))
                            <span class="error text-danger">{{ $errors->first('descripcion') }}</span>
                        @endif

                        <div class="form-group">
                            <label for="mail">Correo electrónico</label>
                            <input type="email" class="form-control" name="mail" id="mail" value="{{ $empresa->mail }}"
                                aria-describedby="helpId">
                        </div>
                        @if ($errors->has('mail'))
                            <span class="error text-danger">{{ $errors->first('mail') }}</span>
                        @endif
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion"
                                value="{{ $empresa->direccion }}" aria-describedby="helpId">
                        </div>
                        @if ($errors->has('direccion'))
                            <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                        @endif
                        <div class="form-group">
                            <label for="nit">Numero de RUC</label>
                            <input type="number" class="form-control" name="nit" id="nit" value="{{ $empresa->nit }}"
                                aria-describedby="helpId">
                        </div>
                        @if ($errors->has('nit'))
                            <span class="error text-danger">{{ $errors->first('nit') }}</span>
                        @endif
                        <div class="form-group">
                            <label for="logo">Logo</label><br>
                            <img src="{{ 'imagen' . '/' . $empresa->logo }}" width="150" alt="logo.png" class="mb-5 mx-auto d-block">
                            <input type="file" name="logo" id="logo" class="form-control">
                            @if ($errors->has('logo'))
                                <span class="error text-danger">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>
                        {{-- <div class="card-body">
                            <h5 class="card-title d-flex">Logo2
                                <small class="ml-auto align-self-end">
                                    <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                                </small>
                            </h5>
                            <img src="{{('imagen').'/'.$empresa->logo}}" width="150" alt="logo.png" class="mb-5"><br>
                            <input type="file" name="picture" id="picture" class="dropify hidden" />
                        </div> --}}


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    @stop

    @section('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @stop

    @section('js')
    @stop
