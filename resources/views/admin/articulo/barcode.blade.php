<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Código de barra de los artículos</title>
    <style>
        .row {
            margin-top: 0px;
            width: 30%;
        }

        h4 {
            margin-top: 0px;
            width: 100%;
            letter-spacing: 12px;
            text-align: center;
        }

        h1 {
            width: 100%;
            margin-bottom: 2px;
        }
        .barra{
            width: 10px;
        }
    </style>
</head>

<body>

    @foreach ($articulos as $articulo)
        <div class="row">
            <h1>{{ ucwords($articulo->nombre) }}</h1>
                <div class="barra">{!! DNS1D::getBarcodeHTML($articulo->codigo, 'C128A') !!}</div>
            <h4>{{ $articulo->codigo }}</h4>
        </div>
    @endforeach

</body>

</html>
