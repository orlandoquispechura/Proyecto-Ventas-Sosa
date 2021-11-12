@extends('adminlte::page')

@section('title', 'Artículo')

@section('content_header')
    <h1>Listado de Artículos</h1>
@stop

@section('content')
    <a href="{{ route('admin.articulos.create') }}" class="btn btn-primary mb-2">Crear Artículos</a>
    <a class="btn btn-secondary mb-2" href="{{ route('print_barcode') }}">Exportar códigos de barras</a>
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> Guardado!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session('update'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong> Editado!</strong> {{ session('update') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped mt-0.5 table-bordered shadow-lg mt-4" id="articulo">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col" width='60px'>Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Imagen</th>
                        {{-- <th scope="col">Precio Venta</th> --}}
                        <th scope="col">Categoría</th>
                        <th scope="col" >Estado</th>
                        <th scope="col" width="100px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articulos as $articulo)
                        <tr>
                            <td>{{ $articulo->codigo }}</td>
                            <td><a href="{{ route('admin.articulos.show', $articulo) }}">{{ ucwords($articulo->nombre) }}</a>
                            </td>
                            <td>{{ $articulo->stock }}</td>
                            <td><img src="{{ asset('storage' . '/' . $articulo->imagen) }}" alt="" width="60"></td>
                            <td>{{ ucwords($articulo->categoria->nombre) }}</td>
                            @if ($articulo->estado == 'ACTIVO')
                                <td>
                                    <a class="jsgrid-button btn btn-success"
                                        href="{{ route('cambio.estado.articulos', $articulo) }}" title="Editar">
                                        Activo <i class="fas fa-check"></i>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a class="jsgrid-button btn btn-danger"
                                        href="{{ route('cambio.estado.articulos', $articulo) }}" title="Editar">
                                        Desactivado <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            @endif
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.articulos.edit', $articulo) }}">Editar</a>
                                {{-- {!! Form::open(['route' => ['articulos.destroy', $articulo], 'method' => 'DELETE']) !!}
                                <input class="btn btn-danger" type="submit" value="Eliminar">

                                {!! Form::close() !!} --}}
                            </td>
                            {{-- <td>
                                <form action="{{route('articulos.destroy', $articulo)}}" class="eliminar-form" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('articulos.edit', $articulo) }}" class="btn btn-success ">Editar </a>

                                    <input type="submit" class="btn btn-danger" value="Eliminar">
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/responsive.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>

    <script>
        $('.eliminar-form').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Quieres eliminar?',
                text: "El registro se eliminara definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
    @if (session('delete') == 'ok')
        <script>
            Swal.fire(
                'Eliminar!',
                'Se Eliminó el registro.',
                'warning'
            )
        </script>
    @endif


    <script>
        $(document).ready(function() {
            $('#articulo').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registro por página",
                    "zeroRecords": "No se encontro registro",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "search": "Buscar",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    },
                    "infoEmpty": "No records available",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)"
                },
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ]

            });
        });
    </script>
@stop
