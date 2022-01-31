<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de venta</title>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
    }

    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }

    #fact {
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        background: #33AFFF;
        padding: 0 20px;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #facliente {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }

    #facliente thead {
        padding: 20px;
        background:#33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #facvendedor {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facvendedor thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproducto thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #proveedor {
        text-align: justify;
    }
</style>
<body>
    <header>
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <td class="proveedor"><h3>DATOS DEL VENDEDOR</h3></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="proveedor">
                            <p>Nombre: {{ ucwords($venta->user->name) }}<br>
                                Email: {{ $venta->user->email }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>DATOS DEL CLIENTE</h4>
                            <p class="dato-cliente">
                                Cliente: {{ ucwords($venta->cliente->nombre) }}
                                {{ Str::ucfirst($venta->cliente->apellido_paterno) }}<br>
                                Dni: {{ $venta->cliente->dni }}<br>
                                Teléfono: {{ $venta->cliente->telefono }}
                            </p>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td><h4>Fecha de la venta: </h4> </td>
                        <td>{{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d-m-Y H:i a') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="fact">
            <p>
                NOTA DE VENTA
                <br>
               &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; {{ $venta->id }}
            </p>
        </div>
    </header>
    <br>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th align="left">CANTIDAD</th>
                        <th align="left">PRODUCTO</th>
                        <th align="left">PRECIO VENTA(Bs)</th>
                        <th align="left">DESCUENTO(%)</th>
                        <th align="left">SUBTOTAL(Bs)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalleventas as $detalleventa)
                        <tr>
                            <td>{{ $detalleventa->cantidad }}</td>
                            <td>{{ Str::ucfirst($detalleventa->articulo->nombre) }}</td>
                            <td>Bs. {{ $detalleventa->precio_venta }}</td>
                            <td>{{ $detalleventa->descuento }} %</td>
                            <td align="left">Bs.
                                {{ number_format($detalleventa->cantidad * $detalleventa->precio_venta - ($detalleventa->cantidad * $detalleventa->precio_venta * $detalleventa->descuento) / 100, 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL PAGAR: &nbsp; </p>
                        </th>
                        <td>
                            <p align="left">Bs. {{ number_format($venta->total, 2) }}</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <!--puedes poner un mensaje aqui-->
        <div id="datos">
            <p id="encabezado">
                {{-- <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}} --}}
            </p>
        </div>
    </footer>

</body>

</html>
