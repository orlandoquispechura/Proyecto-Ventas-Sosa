@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <div class="form-row">
        <div class="col-md-6"></div>
        <div class="col-md-6 col-xl-12">
            <h5 style="text-align: right; margin-right: 30px; ">Fecha: @php
                echo date('d/m/Y');
            @endphp</h5>
        </div>
    </div>
    <h1>Registrar Ingreso</h1>
@stop

@section('content')
    <div class="card ">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.compras.store', 'method' => 'POST']) !!}
            <div class="card-body">
                @include('admin.compra._form')
            </div>
            <div class="card-footer text-muted">
                <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                <a href="{{ route('admin.compras.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </div>
            {!! Form::close() !!}
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    {!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
@stop

@section('js')
    {!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        //new
        // $("#articulo_id").change(mostrarValores);

        // function mostrarValores() {
        //     datosProducto = document.getElementById('articulo_id').value.split('_');
        //     $("#precio_venta").val(datosProducto[1]);
        // } //new

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
                    // $("#precio_venta").val(data.precio_venta);
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
            // precio_venta = $("#precio_venta").val();
            impuesto = $("#impuesto").val();

            if (articulo_id != "" && cantidad != "" && cantidad > 0 && precio_compra != "" && articulo_id != null) {
                if (precio_compra <= 10000) {
                    subtotal[cont] = cantidad * precio_compra;
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila' + cont +
                        '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                        ');"><i class="fas fa-trash-alt"></i></button></td><td><input type="hidden" name="articulo_id[]" value="' +
                        articulo_id + '">' + articulo +
                        '</td> <td> <input type="hidden" id="precio_compra[]" name="precio_compra[]" value="' +
                        precio_compra + '"> <input class="form-control" type="number" id="precio_compra[]" value="' +
                        precio_compra +
                        '" disabled> </td>  <td> <input type="hidden" name="cantidad[]" value="' + cantidad +
                        '"> <input class="form-control" type="number" value="' + cantidad +
                        '" disabled> </td> <td align="right">Bs ' + parseFloat(subtotal[cont]).toFixed(2) + ' </td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        icon: 'error',
                        cancelButtonColor: '#d33',
                        text: 'El precio no puede exceder a 10000',

                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    cancelButtonColor: '#d33',
                    text: 'Rellene todos los campos del detalle de ingreso',

                })
            }
        }

        function limpiar() {
            $("#cantidad").val("");
            $("#precio_compra").val("");
        }

        function totales() {
            $("#total").html("Bs " + total.toFixed(2));
            total_pagar = total;
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
            total_pagar_html = total;
            $("#total").html("Bs" + total);
            $("#total_pagar_html").html("Bs" + total_pagar_html.toFixed(2));
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>

    <script>
        $(document).ready(function() {
            $("form").keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });
        });
    </script>

    <script>
        $("#precio_compra").blur(function() {
            this.value = parseFloat(this.value).toFixed(2);
        });
    </script>

@stop
