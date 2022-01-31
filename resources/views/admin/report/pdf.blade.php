<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de ventas</title>
{{-- <link rel="stylesheet" href="{{ asset('public/css/app.css') }}" type="text/css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}

<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .datos {
        margin-top: -120px;
        width: 100%;
    }

    /* .izquierda {
        
        margin-left: 10px;
    } */

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 30px;
    }

    hr {
        position: absolute;
        bottom: 0;
        width: 100%;

    }

    .superior {
        background: #1f78ac;
        color: white;
        height: 150px;
    }

</style>

<body>
    <section style="top: 0px;">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="2" style="text-align: center">
                    <span style="font-size: 25px; font-weight: bold; ">Sistema de Ventas SOSA</span>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top:0px; position: relative;">
                    <img style="width: 250px; align-content: left" src="imagen/logo-mueble-reporte.png"
                        alt="logo-reporte.png" width="30%" height="250">
                </td>
                <td width="70%" class="text-left" style="vertical-align: top; padding-top:10px;">
                    @if ($tipoReporte == 0)
                        <span style="font-size: 16px; "><strong>Reporte de ventas del día</strong></span>
                    @else
                        <span style="font-size: 16px; "><strong>Reporte de ventas por fecha</strong></span>
                    @endif
                    <br>
                    @if ($tipoReporte != 0)
                        <span style="font-size: 16px; "><strong>Fecha Consulta: {{ $desde }} al
                                {{ $hasta }}</strong></span>
                    @else
                        <span style="font-size: 16px; "><strong>Fecha Consulta:
                                {{ \Carbon\Carbon::now()->format('d-m-Y') }}</strong></span>
                    @endif
                    <br>
                    <span style="font-size: 14px; ">Usuario: {{ $user }}</span>
                </td>
            </tr>
        </table>
    </section>
    <section class="datos">
        <div>
            <table class="tabla" style="width: 100%; margin-top: 10px;">
                <thead class="superior" style="height: 150px;">
                    <tr style="height: 150px;">
                        <th style="text-align: center;">Id</th>
                        <th style="text-align: center;">Fecha</th>
                        <th style="text-align: center;">Estado</th>
                        <th style="text-align: center;">Usuario</th>
                        <th style="text-align: center;">Total</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    @foreach ($data as $venta)
                        <tr>
                            <th scope="row">
                                {{ $venta->id }}
                            </th>
                            <td scope="row" style="text-align: center;">
                                {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d-M-y H:i a') }}
                            </td>
                            <td scope="row" style="text-align: center;">{{ $venta->estado }}</td>
                            <td scope="row" style="text-align: center;">{{ $venta->user }}</td>
                            <td scope="row" style="text-align: left;">Bs. {{ number_format($venta->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <p align="right">TOTAL INGRESOS:</p>
                        </td>
                        <td>
                            <p align="left">Bs. {{ number_format($data->sum('total'), 2) }}</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <hr>
    <section class="footer text-dark">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td width="60" style="text-align: center">
                    Mueblería SOSA
                </td>
            </tr>
        </table>
    </section>


</body>

</html>
