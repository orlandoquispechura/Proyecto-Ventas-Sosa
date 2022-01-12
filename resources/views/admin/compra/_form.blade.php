<div class="form-row">
    <div class="form-group col-md-6">
        <label for="articulo_id">Artículo</label>
        <select class="form-control selectpicker articuloB" data-live-search="true" name="articulo_id" id="articulo_id"
            lang="es" autofocus>
            <option data-icon="fas fa-procedures" disabled selected>Buscar artículo</option>
            @foreach ($articulos as $articulo)
                <option value="{{ $articulo->id }}">{{ $articulo->codigo }} {{ $articulo->nombre }}</option>
            @endforeach
        </select>
        @if ($errors->has('articulo_id'))
            <div class="alert alert-danger">
                <span class="error text-danger">{{ $errors->first('articulo_id') }}</span>
            </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="proveedor_id">Proveedor</label>
        <select class="form-control selectpicker proveedorB" data-live-search="true" name="proveedor_id"
            id="proveedor_id" lang="es">
            <option data-icon="fas fa-shipping-fast" disabled selected>Buscar proveedor</option>
            @foreach ($proveedors as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->razon_social }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('proveedor_id'))
            <div class="alert alert-danger">
                <span class="error text-danger">{{ $errors->first('proveedor_id') }}</span>
            </div>
        @endif
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" min="0" max="100" name="cantidad" id="cantidad" step="1"
                oninput="validity.valid||(value='')">
            @if ($errors->has('cantidad'))
                <div class="alert alert-danger">
                    <span class="error text-danger">{{ $errors->first('cantidad') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="precio_compra">Precio de compra</label>
            <input type="number" class="form-control" min="0" max="10000" name="precio_compra" id="precio_compra"
                placeholder="0.00" step="0.25" >
            @if ($errors->has('precio_compra'))
                <div class="alert alert-danger">
                    <span class="error text-danger">{{ $errors->first('precio_compra') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group col-md-3 ml-5 mt-3">
        <div class="form-group">
            <button type="button" id="agregar" class="btn btn-info float-right mt-1"> <i class="fas fa-check"></i>
                Agregar
                artículo</button>
        </div>
    </div>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12   table-bordered shadow-lg">
        <table id="detalles" class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Eliminar</th>
                    <th>Artículo</th>
                    <th>Precio(Bs)</th>
                    <th>Cantidad</th>
                    <th>SubTotal(Bs)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">Bs 0.00</span> <input type="hidden"
                                name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
