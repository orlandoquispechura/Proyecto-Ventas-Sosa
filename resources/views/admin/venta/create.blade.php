@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1 class="text-bold">Registro de Venta</h1>
@stop

@section('content')
    <div class="card">
        <li class="nav-item d-none d-lg-flex">
            <a class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal-2">
                <span class="btn btn-warning">+ Registrar Cliente</span>
            </a>
        </li>
        {!! Form::open(['route' => 'ventas.store', 'method' => 'POST']) !!}
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Registro de venta</h4>
            </div>
            @include('admin.venta._form')
        </div>
        <div class="card-footer text-muted">
            <button type="submit" id="guardar" class="btn btn-success float-right">Registrar</button>
            <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Registro rápido de cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'clientes.store', 'method' => 'POST', 'files' => true]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId"
                            required>
                        @if ($errors->has('nombre'))
                            <span class="error text-danger">{{ $errors->first('nombre') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" required>
                        @if ($errors->has('dni'))
                            <span class="error text-danger">{{ $errors->first('dni') }}</span>
                        @endif
                    </div>
                    <input type="hidden" name="venta" value="1">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();
            });
        });

        var cont = 1;
        total = 0;
        subtotal = [];
        $("#guardar").hide();

        $("#articulo_id").change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('articulo_id').value.split('_');
            $("#precio_venta").val(datosProducto[2]);
            $("#stock").val(datosProducto[1]);
        }

        var articulo_id = $('#articulo_id');

        articulo_id.change(function() {
            $.ajax({
                url: "{{ route('get_products_by_id') }}",
                method: 'GET',
                data: {
                    articulo_id: articulo_id.val(),
                },
                success: function(data) {
                    $("#precio_venta").val(data.precio_venta);
                    $("#stock").val(data.cantidad);
                    $("#codigo").val(data.codigo);
                }
            });
        });


        $(obtener_registro());

        function obtener_registro(codigo) {
            $.ajax({
                url: "{{ route('get_products_by_barcode') }}",
                type: 'GET',
                data: {
                    codigo: codigo
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $("#precio_venta").val(data.precio_venta);
                    $("#stock").val(data.cantidad);
                    $("#articulo_id").val(data.id);
                }
            });
        }
        $(document).on('keyup', '#codigo', function() {
            var valorResultado = $(this).val();
            if (valorResultado != "") {
                obtener_registro(valorResultado);
            } else {
                obtener_registro();
            }
        })


        function agregar() {
            datosProducto = document.getElementById('articulo_id').value.split('_');

            articulo_id = datosProducto[0];
            articulo = $("#articulo_id option:selected").text();
            cantidad = $("#cantidad").val();
            descuento = $("#descuento").val();
            precio_venta = $("#precio_venta").val();
            stock = $("#stock").val();
            impuesto = $("#impuesto").val();
            if (articulo_id != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio_venta != "") {
                if (parseInt(stock) >= parseInt(cantidad)) {
                    subtotal[cont] = (cantidad * precio_venta) - (cantidad * precio_venta * descuento / 100);
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila' + cont +
                        '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                        ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="articulo_id[]" value="' +
                        articulo_id + '">' + articulo + '</td> <td> <input type="hidden" name="precio_venta[]" value="' +
                        parseFloat(precio_venta).toFixed(2) + '"> <input class="form-control" type="number" value="' +
                        parseFloat(
                            precio_venta).toFixed(2) +
                        '" disabled> </td> <td> <input type="hidden" name="descuento[]" value="' +
                        parseFloat(descuento) + '"> <input class="form-control" type="number" value="' + parseFloat(
                            descuento) + '" disabled> </td> <td> <input type="hidden" name="cantidad[]" value="' +
                        cantidad +
                        '"> <input type="number" value="' + cantidad +
                        '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(
                            2) + '</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        type: 'error',
                        text: 'La cantidad a vender supera el stock.',
                    })
                }
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la venta.',
                })
            }
        }

        function limpiar() {
            $("#cantidad").val("");
            $("#descuento").val("0");
        }

        function totales() {
            $("#total").html("Bs " + total.toFixed(2));

            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("Bs " + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("Bs " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto / 100;
            total_pagar_html = total + total_impuesto;
            $("#total").html("Bs" + total);
            $("#total_impuesto").html("Bs" + total_impuesto);
            $("#total_pagar_html").html("Bs" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>


@stop