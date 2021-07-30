@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>Registro de Compra</h1>
@stop

@section('content')
    <div class="card ">
        <div class="card-body">
            {!! Form::open(['route' => 'compras.store', 'method' => 'POST']) !!}
            <div class="card-body"> 
                @include('admin.compra._form')
            </div>
            <div class="card-footer text-muted">
                <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                <a href="{{ route('compras.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();
            });
        });

        var cont = 0;
        total = 0;
        subtotal = [];

        $("#guardar").hide();
        var articulo_id = $('#articulo_id');
        articulo_id.change(function() {
            $.ajax({
                url: "{{ route('get_products_by_id') }}",
                method: 'GET',
                data: {
                    articulo_id: articulo_id.val(),
                },
                success: function(data) {
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

            articulo_id = $("#articulo_id").val();
            articulo = $("#articulo_id option:selected").text();
            cantidad = $("#cantidad").val();
            precio_compra = $("#precio_compra").val();
            impuesto = $("#impuesto").val();

            if (articulo_id != "" && cantidad != "" && cantidad > 0 && precio_compra != "") {
                precio_compra
                subtotal[cont] = cantidad * precio_compra;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                    ');"><i class="fa fa-times"></i></button></td><td><input type="hidden" name="articulo_id[]" value="' +
                    articulo_id + '">' + articulo + '</td> <td> <input type="hidden" id="precio_compra[]" name="precio_compra[]" value="' +
                    precio_compra + '"> <input class="form-control" type="number" id="precio_compra[]" value="' + precio_compra +
                    '" disabled> </td>  <td> <input type="hidden" name="cantidad[]" value="' + cantidad +
                    '"> <input class="form-control" type="number" value="' + cantidad +
                    '" disabled> </td> <td align="right">s/' + subtotal[cont] + ' </td></tr>';

                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    icon: 'error',
                    cancelButtonColor: '#d33',
                    text: 'Rellene todos los campos del detalle de la compras',
                   
                })
            }
        }

        function limpiar() {
            $("#cantidad").val("");
            $("#precio_compra").val("");
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
