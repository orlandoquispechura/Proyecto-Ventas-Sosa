<div class="form-row">

    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="articulo_id">Artículo</label>
            <select class="form-control selectpicker articuloB" data-live-search="true" name="articulo_id"
                id="articulo_id" lang="es" autofocus>
                <option value="" data-icon="fas fa-procedures" disabled selected>Buscar artículo</option>
                @foreach ($articulos as $articulo)
                    <option value="{{ $articulo->id }}_{{ $articulo->stock }}_{{ $articulo->precio_venta }}">
                        {{ $articulo->codigo }} {{ $articulo->nombre }}</option>
                @endforeach
            </select>
            @if ($errors->has('articulo_id'))
                <div class="alert alert-danger">
                    <span class="error text-danger">{{ $errors->first('articulo_id') }}</span>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="cliente_id">Cliente</label>
        <select class="form-control selectpicker clienteB" data-live-search="true" name="cliente_id" id="cliente_id"
            lang="es">
            <option value="" data-icon="fas fa-user-tie" disabled selected>Buscar cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->dni }} {{ $cliente->nombre }}</option>
            @endforeach
        </select>
        @if ($errors->has('cliente_id'))
            <div class="alert alert-danger">
                <span class="error text-danger">{{ $errors->first('cliente_id') }}</span>
            </div>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" min="0"
                max="100" oninput="validity.valid||(value='')">
            @if ($errors->has('cantidad'))
                <div class="alert alert-danger">
                    <span class="error text-danger">{{ $errors->first('cantidad') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="stock">Stock actual</label>
            <input type="text" name="stock" id="stock" class="form-control" disabled>
        </div>
    </div>
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="precio_venta">Precio de venta</label>
            <input type="number" class="form-control" name="precio_venta" id="precio_venta" aria-describedby="helpId"
                disabled>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label for="descuento">Descuento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">%</span>
            </div>
            <input type="number" class="form-control" name="descuento" id="descuento" aria-describedby="basic-addon2"
                value="0" min="0" max="100" oninput="validity.valid||(value='')">
        </div>
    </div>
    <div class="form-group col-md-3 mt-4">
        <div class="form-group mt-2">
            <button type="button" id="agregar" class="btn btn-info float-right"> <i class="fas fa-check"></i> Agregar
                Artículo</button>
        </div>
    </div>
</div>
{{-- detalle de compras --}}

<div class="form-group mt-4">
    <h4 class="card-title">Detalles de venta</h4>
    <div class="table-responsive col-md-12  table-bordered shadow-lg">
        <table id="detalles" class="table table-striped col-md-12 table-bordered shadow-lg">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Eliminar</th>
                    <th>Artículo</th>
                    <th>Precio Venta (Bs)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th style="width:150px;">SubTotal (Bs)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">Bs 0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
