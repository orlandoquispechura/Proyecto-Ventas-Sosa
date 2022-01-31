@extends('adminlte::page')

@section('title', 'Información sobre el usuario')

@section('content_header')
    <div class="form-row">
        <div class="col-md-6"></div>
        <div class="col-md-6 col-xl-12">
            <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
                echo date('d/m/Y');
            @endphp</h5>
        </div>
    </div>
    <h1>Usuario: {{ $user->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="border-bottom text-center pb-4">
                        <h3>{{ ucwords($user->name) }}</h3>
                    </div>
                    <div class="border-bottom py-4">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                                href="#list-home" user="tab" aria-controls="home">
                                Sobre el usuario
                            </a>
                            <a type="button" class="list-group-item list-group-item-action" id="list-profile-list"
                                data-toggle="list" href="#list-profile" user="tab" aria-controls="profile">Historial de
                                compras</a>

                            <a type="button" class="list-group-item list-group-item-action" id="list-messages-list"
                                data-toggle="list" href="#list-messages" user="tab" aria-controls="messages">Historial de
                                ventas</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-lg-5">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" user="tabpanel"
                            aria-labelledby="list-home-list">

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
                                            {{ ucwords($user->name) }}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-user-tag mr-1"></i> Roles</strong>
                                        <p class="text-muted">
                                            @forelse ($user->roles as $role)
                                                @can('roles.show')
                                                    <a href="{{ route('admin.roles.show', $role) }}"
                                                        class="bg-primary text-white p-1 mt-2 rounded mt-3 ">{{ $role->name }}</a>
                                                @endcan
                                            @empty <span>
                                                    <h4 class="text-danger">El usuario no tiene rol</h4>
                                                </span>
                                            @endforelse
                                        </p>
                                        <hr>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-envelope mr-1"></i>
                                            Correo electrónico</strong>
                                        <p class="text-muted">
                                            {{ $user->email }}
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
                                        <table id="order-listing"
                                            class="table compra table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Fecha</th>
                                                    <th>Total</th>
                                                    <th>Estado</th>
                                                    <th style="width: 180px;">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->compras as $compra)
                                                    <tr>
                                                        <th scope="row">
                                                            {{ $compra->id }}
                                                        </th>
                                                        <td>{{ $compra->fecha_compra }}</td>
                                                        <td>Bs. {{ number_format($compra->total, 2) }}</td>

                                                        @if ($compra->estado == 'VALIDO')
                                                            <td>
                                                                <a class="btn btn-success btn-sm"
                                                                    href="{{ route('cambio.estado.compras', $compra) }}"
                                                                    title="Editar">
                                                                    Activo <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a class="btn btn-danger btn-sm"
                                                                    href="{{ route('cambio.estado.compras', $compra) }}"
                                                                    title="Editar">
                                                                    Cancelado <i class="fas fa-times"></i>
                                                                </a>
                                                            </td>
                                                        @endif
                                                        <td style="width:180px;">
                                                            @can('compras.pdf')
                                                                <a href="{{ route('compras.pdf', $compra) }}"
                                                                    class="btn btn-danger btn-sm">Imprimir <i
                                                                        class="far fa-file-pdf"></i></a>
                                                            @endcan

                                                            @can('compras.show')
                                                                <a href="{{ route('admin.compras.show', $compra) }}"
                                                                    class="btn btn-info btn-sm">Ver <i
                                                                        class="far fa-eye"></i></a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2"><strong>Monto total comprado: </strong></td>
                                                    <td colspan="3" align="left"><strong>Bs.
                                                            {{ number_format($total_monto, 2) }}</strong>
                                                    </td>
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
                                        <table id="order-listing1"
                                            class="table venta table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Fecha</th>
                                                    <th>Total</th>
                                                    <th>Estado</th>
                                                    <th style="width:180px;">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->ventas as $venta)
                                                    <tr>
                                                        <th scope="row">
                                                            {{ $venta->id }}
                                                        </th>
                                                        <td>{{ $venta->fecha_venta }}</td>
                                                        <td>Bs. {{ number_format($venta->total, 2) }}</td>

                                                        @if ($venta->estado == 'VALIDO')
                                                            <td>
                                                                <a class="btn btn-success btn-sm"
                                                                    href="{{ route('cambio.estado.ventas', $venta) }}"
                                                                    title="Editar">
                                                                    Activo <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a class="btn btn-danger btn-sm"
                                                                    href="{{ route('cambio.estado.ventas', $venta) }}"
                                                                    title="Editar">
                                                                    Cancelado <i class="fas fa-times"></i>
                                                                </a>
                                                            </td>
                                                        @endif

                                                        <td sstyle="width: 180px;">
                                                            @can('ventas.pdf')
                                                                <a href="{{ route('ventas.pdf', $venta) }}"
                                                                    class="btn btn-danger btn-sm">Imprimir <i
                                                                        class="far fa-file-pdf"></i></a>
                                                            @endcan

                                                            @can('ventas.show')
                                                                <a href="{{ route('admin.ventas.show', $venta) }}"
                                                                    class="btn btn-info btn-sm">Ver <i
                                                                        class="far fa-eye"></i></a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2"><strong>Monto total vendido: </strong></td>
                                                    <td colspan="3" align="left"><strong>Bs.
                                                            {{ number_format($total_compras, 2) }}</strong>
                                                    </td>
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
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary float-right">Regresar</a>
        </div>
    </div>
    <br><br>
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
