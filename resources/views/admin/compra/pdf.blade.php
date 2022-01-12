<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
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
        </div>
        <div id="fact">
            <p>NOTA DE COMPRA<br />
                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; {{ $compra->id }}</p>
        </div>
    </header>
    <br>


    <br>

    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th align="left">COMPRADOR</th>
                        <th align="left">FECHA COMPRA</th>
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
                        <th align="left">CANTIDAD</th>
                        <th align="left">PRODUCTO</th>
                        <th align="left">PRECIO COMPRA (Bs)</th>
                        <th align="left" >SUBTOTAL (Bs)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detallecompras as $detallecompra)
                        <tr>
                            <td>{{ $detallecompra->cantidad }}</td>
                            <td>{{ ucwords($detallecompra->articulo->nombre) }}</td>
                            <td>Bs. {{ $detallecompra->precio_compra }}</td>
                            <td align="left">Bs. {{ number_format($detallecompra->cantidad * $detallecompra->precio_compra, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL PAGAR: &nbsp;</p>
                        </th>
                        <td>
                            <p align="left">Bs. {{ number_format($compra->total, 2) }}
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
