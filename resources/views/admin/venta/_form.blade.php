<div class="form-group">
    <label for="cliente_id">Cliente</label>
    <select class="form-control selectpicker clienteB" data-live-search="true" name="cliente_id" id="cliente_id" lang="es">
        <option value="" data-icon="fas fa-user-tie" disabled selected>Buscar cliente</option>
        @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
        @endforeach
    </select>
    @if ($errors->has('cliente_id'))
                    <span class="error text-danger">{{ $errors->first('cliente_id') }}</span>
                @endif
</div>

<div class="form-group">
    <label for="codigo">Código de barras</label>
    <input type="text" name="codigo" id="codigo" class="form-control" aria-describedby="helpId" value="{{old('codigo')}}">
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="articulo_id">Artículo</label>
            <select class="form-control selectpicker articuloB" data-live-search="true" name="articulo_id" id="articulo_id" lang="es">
                <option value="" data-icon="fas fa-procedures" disabled selected>Buscar artículo</option>
                @foreach ($articulos as $articulo)
                <option value="{{ $articulo->id }}">{{ $articulo->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="stock">Stock actual</label>
            <input type="text" name="stock" id="stock" class="form-control" disabled value="{{old('stock')}}">
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="precio_venta">Precio de venta</label>
            <input type="number" class="form-control" name="precio_venta" id="precio_venta" aria-describedby="helpId"
                disabled value="{{old('precio_venta')}}">
        </div>
    </div>
</div>




<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="impuesto">Impuesto</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="impuesto" id="impuesto" aria-describedby="basic-addon3"
                value="0" disabled>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="descuento">Porcentaje de descuento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">%</span>
            </div>
            <input type="number" class="form-control" name="descuento" id="descuento" aria-describedby="basic-addon2"
                value="0">
        </div>
    </div>
</div>
{{-- detalle de compras --}}
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Artículo</button>
</div>
<div class="form-group mt-4">
    <h4 class="card-title">Detalles de venta</h4>
    <div class="table-responsive col-md-12  table-bordered shadow-lg">
        <table id="detalles" class="table table-striped ">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Eliminar</th>
                    <th>Artículo</th>
                    <th>Precio Venta (Bs)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal (Bs)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">Bs 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL IMPUESTO (13%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">Bs 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">Bs 0.00</span> <input type="hidden"
                                name="total" id="total_pagar"></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">MONTO A PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="monto_pagar_html"></span> 
                            <input type="number" placeholder="Bs 0.00" name="pagar" id="monto_pagar" class="form-control"></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">CAMBIO:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="cambio_html">Bs 0.00</span> <input type="hidden"
                                name="cambio" id="cambio"></p>
                    </th>
                </tr>
                
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
