<div class="form-row">
    <div class="form-group col-md-8">
        <div class="form-group">
            <label for="proveedor_id">Proveedor</label>
            <select class="form-control" name="proveedor_id" id="proveedor_id" autofocus>
                <option value="" disabled selected>Selecccione un proveedor</option>
                @foreach ($proveedors as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->razon_social }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="impuesto">Impuesto</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="impuesto" id="impuesto" aria-describedby="basic-addon3"
                placeholder="13" value="0">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="codigo">Código de barras</label>
    <input type="text" name="codigo" id="codigo" class="form-control"aria-describedby="helpId">
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="articulo_id">Producto</label>
            <select class="form-control" name="articulo_id" id="articulo_id">
                <option value="" disabled selected>Selecccione un artículo</option>
                @foreach ($articulos as $articulo)
                    <option value="{{ $articulo->id }}">{{ $articulo->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="precio_compra">Precio de compra</label>
            <input type="number" class="form-control" name="precio_compra" id="precio_compra" aria-describedby="helpId">
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar artículo</button>
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
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">Bs 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (13%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">Bs 0.00</span></p>
                    </th>
                </tr>
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
