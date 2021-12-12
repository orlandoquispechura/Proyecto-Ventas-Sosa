<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}

    <title>Reporte de compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .datosproveedor{
            float: left;
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
            color: white;
            font-weight: bold;
            border-radius: 5px;
            background: #33AFFF;
            padding: 0 20px;
        }

        section {
            clear: left;
        }

        #cliente {
            text-align: left;
        }

        #faproveedor {
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

        #faproveedor thead {
            padding: 20px;
            background: #33AFFF;
            text-align: left;
            border-bottom: 1px solid #FFFFFF;
        }

        #faccomprador {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #faccomprador thead {
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
    </style>
</head>

<body>
    <header>
        <div class="datosproveedor">
            <h3>DATOS DEL PROVEEDOR</h3>
            <p id="proveedor">Nombre: {{ ucwords($compra->proveedor->razon_social) }}<br>
                Nit: {{$compra->proveedor->nit}}<br>                                
                Teléfono: {{ $compra->proveedor->telefono }}<br>
                Email: {{ $compra->proveedor->email }}<br>  
                Dirección: {{ ucwords($compra->proveedor->direccion) }}                             
            </p>
            {{-- <table id="datos">
                <thead>
                    <tr>
                        <th>DATOS DEL PROVEEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre: {{ ucwords($compra->proveedor->razon_social) }}<br>
                                Nit: {{$compra->proveedor->nit}}<br>                                
                                Teléfono: {{ $compra->proveedor->telefono }}<br>
                                Email: {{ $compra->proveedor->email }}<br>  
                                Dirección: {{ ucwords($compra->proveedor->direccion) }}                             
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table> --}}
        </div>
        <div id="fact">
            <p>NOTA DE COMPRA<br />
                {{ $compra->id }}</p>
        </div>
    </header>
    <br>


    <br>

    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR</th>
                        <th>FECHA COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ ucwords($compra->user->name) }}</td>
                        <td>{{ $compra->fecha_compra }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO COMPRA (Bs)</th>
                        <th style="text-align: right" >SUBTOTAL (Bs)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detallecompras as $detallecompra)
                        <tr>
                            <td>{{ $detallecompra->cantidad }}</td>
                            <td>{{ ucwords($detallecompra->articulo->nombre) }}</td>
                            <td>Bs/ {{ $detallecompra->precio_compra }}</td>
                            <td align="right">Bs/ {{ number_format($detallecompra->cantidad * $detallecompra->precio_compra, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">Bs/ {{ number_format($compra->total, 2) }}
                            <p>
                        </td>
                    </tr>

                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <!--se puede poner un mensaje aqui-->
        <div id="datos">
            <p id="encabezado">
                {{-- <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}} --}}
            </p>
        </div>
    </footer>
    
</body>

</html>
