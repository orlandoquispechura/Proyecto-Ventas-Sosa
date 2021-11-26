
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Códigos de barras</title>
    <style>
        .row{
            margin: 0px;
        }
        h2{
            margin-top: 8px;
        }
        
    </style>
</head>
<body>
    
    <div class="row">
        @foreach ($articulos as $articulo)
        <div class="col-md-4">
            <div> {!!DNS1D::getBarcodeHTML($articulo->codigo, 'C128A'); !!}</div>
            <h2>{{$articulo->codigo}}</h2>
        </div>
        @endforeach
    </div>
</body>
</html>