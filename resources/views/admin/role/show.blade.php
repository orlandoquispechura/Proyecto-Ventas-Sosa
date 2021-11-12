@extends('adminlte::page')

@section('title', 'Información de los roles')

@section('content_header')
<h1 class="text-bold"> Rol: {{ $role->name }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="border-bottom text-center pb-4">
                    <h3>{{ isset($role->name) ? $role->name : '' }}</h3>
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="border-bottom py-4">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                            href="#list-home" role="tab" aria-controls="home">
                            Permisos
                        </a>
                        <a type="button" class="list-group-item list-group-item-action" id="list-profile-list"
                            data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Usuarios</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 pl-lg-5">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                        aria-labelledby="list-home-list">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Permisos asignados al rol</h4>
                            </div>
                        </div>
                        <div class="profile-feed">
                            <div class="d-flex align-items-start profile-feed-item">

                                <div class="table-responsive">
                                    <table id="order-listing"
                                        class="table table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap roles">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Slug</th>
                                                <th>description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $permission)
                                            <tr>
                                                <th scope="row">{{ $permission->id }}</th>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->slug }}</td>
                                                <td>{{ $permission->description }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Usuarios con el rol</h4>
                            </div>
                        </div>
                        <div class="profile-feed">
                            <div class="d-flex align-items-start profile-feed-item">

                                <div class="table-responsive">
                                    <table id="order-listing1"
                                        class="table table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap roles">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Correo electrónico</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td style="width: 50px;">
                                                    {!! Form::open(['route' => ['admin.users.destroy', $user], 'method'
                                                    => 'DELETE']) !!}

                                                    <a class="jsgrid-button jsgrid-edit-button"
                                                        href="{{ route('admin.users.edit', $user) }}" title="Editar">
                                                        <i class="far fa-edit" style="color: darkgreen"></i>
                                                    </a>

                                                    <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                        type="submit" title="Eliminar">
                                                        <i class="far fa-trash-alt" style="color: red"></i>
                                                    </button>

                                                    {!! Form::close() !!}
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
    </div>
</div>
<a href="{{route('admin.roles.index')}}" class="btn btn-secondary">Regresar</a>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
