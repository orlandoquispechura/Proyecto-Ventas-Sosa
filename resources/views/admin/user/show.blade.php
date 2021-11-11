@extends('adminlte::page')

@section('title', 'Información sobre el usuario')

@section('content_header')
    <h1 class="text-bold">Tablero</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="border-bottom text-center pb-4">
                        <h3>{{$user->name}}</h3>
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="border-bottom py-4">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" user="tab" aria-controls="home">
                                Sobre el usuario
                            </a>
                            <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" user="tab" aria-controls="profile">Historial de compras</a>

                            <a type="button" class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" user="tab" aria-controls="messages">Historial de ventas</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-lg-5">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" user="tabpanel" aria-labelledby="list-home-list">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del usuario</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                        <p class="text-muted">
                                            {{$user->name}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Roles</strong>
                                        <p class="text-muted">
                                            @foreach ($user->roles as $role)
                                            <a href="{{route('roles.show',$role)}}">{{$role->name}}</a>
                                            @endforeach
                                        </p>
                                        <hr>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-mobile mr-1"></i>
                                            Correo electrónico</strong>
                                        <p class="text-muted">
                                            {{$user->email}}
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
                                        <table id="order-listing" class="table compra table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Fecha</th>
                                                    <th>Total</th>
                                                    <th>Estado</th>
                                                    <th style="width:50px;">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->compras as $compra)
                                                <tr>
                                                    <th scope="row">
                                                        <a href="{{route('compras.show', $compra)}}">{{$compra->id}}</a>
                                                    </th>
                                                    <td>{{$compra->fecha_compra}}</td>
                                                    <td>{{$compra->total}}</td>
                
                                                    @if ($compra->estado == 'VALIDO')
                                                    <td>
                                                        <a class="jsgrid-button btn btn-success" href="{{route('cambio.estado.compras', $compra)}}" title="Editar">
                                                            Activo <i class="fas fa-check"></i>
                                                        </a>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <a class="jsgrid-button btn btn-danger" href="{{route('cambio.estado.compras', $compra)}}" title="Editar">
                                                            Cancelado <i class="fas fa-times"></i>
                                                        </a>
                                                    </td>
                                                    @endif
                                                    <td style="width: 50px;">
                
                                                        <a href="{{route('compras.pdf', $compra)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                                        {{--  <a href="#" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>  --}}
                                                        <a href="{{route('compras.show', $compra)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                                   
                                                      
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <td colspan="2"><strong>Monto total comprado: </strong></td>
                                                  <td colspan="3" align="left"><strong>s/{{$total_monto}}</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="list-messages" user="tabpanel" aria-labelledby="list-messages-list">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Historial de ventas</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="table-responsive">
                                        <table id="order-listing1" class="table venta table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Fecha</th>
                                                    <th>Total</th>
                                                    <th>Estado</th>
                                                    <th style="width:50px;">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->ventas as $venta)
                                                <tr>
                                                    <th scope="row">
                                                        <a href="{{route('ventas.show', $venta)}}">{{$venta->id}}</a>
                                                    </th>
                                                    <td>{{$venta->fecha_venta}}</td>
                                                    <td>{{$venta->total}}</td>
                
                                                    @if ($venta->estado == 'VALIDO')
                                                    <td>
                                                        <a class="jsgrid-button btn btn-success" href="{{route('cambio.estado.ventas', $venta)}}" title="Editar">
                                                            Activo <i class="fas fa-check"></i>
                                                        </a>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <a class="jsgrid-button btn btn-danger" href="{{route('cambio.estado.ventas', $venta)}}" title="Editar">
                                                            Cancelado <i class="fas fa-times"></i>
                                                        </a>
                                                    </td>
                                                    @endif
                
                                                    <td style="width: 50px;">
                
                                                        <a href="{{route('ventas.pdf', $venta)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                                        {{-- <a href="{{route('ventas.print', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a> --}}
                                                        <a href="{{route('ventas.show', $venta)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                                   
                                                      
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <td colspan="2"><strong>Monto total vendido: </strong></td>
                                                  <td colspan="3" align="left"><strong>s/{{$total_compras}}</strong></td>
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
            <a href="{{route('users.index')}}" class="btn btn-secondary float-right">Regresar</a>
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