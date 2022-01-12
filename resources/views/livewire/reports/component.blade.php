<div class="wrapper">

    <div class="row">
        <div class="col-md-6 font-weight-bold">
            <h3>Reporte de ventas</h3>
        </div>
        <div class="col-md-6 col-sm-12">
            <h5 style="text-align: right; margin-right: 30px; font-weight: bold;">Fecha: @php
                echo date('d/m/Y');
            @endphp</h5>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <span>Seleccionar usuario</span>
                            <div class="form-group">
                                <select class="form-control" wire:model="userId" name="usuario" id="usuario">
                                    <option value="0">Todos</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <span>Seleccionar tipo de reporte</span>
                            <div class="form-group">
                                <select class="form-control" wire:model="tipoReporte">
                                    <option value="0">Reporte del día</option>
                                    <option value="1">Reporte por fecha </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-md-12">
                            <span>Fecha inicial</span>
                            <div class="form-group">
                                <input class="form-control flatpickr" wire:model="desde" type="date"
                                    placeholder="click para elegir">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <span>Fecha final</span>
                            <div class="form-group">
                                <input class="form-control flatpickr" wire:model="hasta" type="date"
                                    placeholder="click para elegir">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 text-center">
                            <div class="form-group">
                                <button type="submit" id="consultar" wire:click="$refresh"
                                    class="btn btn-primary btn-sm btn-block">Consultar <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                @can('reporte.pdf')
                                    <a href="{{ url('report/pdf' . '/' . $userId . '/' . $tipoReporte . '/' . $desde . '/' . $hasta) }}"
                                        class="btn btn-danger btn-sm btn-block {{ count($data) < 1 ? 'disabled' : '' }}"
                                        target="_blank">
                                        Exportar reporte a PDF <i class="fas fa-file-pdf"></i></a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="table-responsive">
                        <table id="order-listing" class="table table-striped mt-0.5 table-bordered shadow-lg mt-4">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Usuario</th>
                                    <th style="width:50px;">Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data) < 1)
                                    <tr>
                                        <td colspan="6">
                                            <h5>Sin Resultados</h5>
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($data as $dat)
                                    <tr>
                                        <td><strong>{{ $dat->id }}</strong></td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($dat->fecha_venta)->format('d-M-y H:i a') }}
                                        </td>
                                        <td>Bs {{ number_format($dat->total, 2) }}</td>
                                        <td>{{ $dat->estado }}</td>
                                        <td>{{ $dat->user }}</td>
                                        <td style="width: 50px;">
                                            @can('ventas.show')
                                                <a href="{{ route('admin.ventas.show', $dat) }}" class="btn btn-info"><i
                                                        class="far fa-eye"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row text-bold " style="color: rgb(135, 141, 153)">
            <div class="col-md-8">
                <p class="text-right">&copy; {{ date('Y') }} Sistema de Ventas SOSA</p>
            </div>
            <div class="col-md-4">
                <p class="text-right ">Versión 1.0.0</p>
            </div>
        </div>
    </footer>
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
@livewireStyles




<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@livewireScripts
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(document.getElementsByClassName('flatpickr'), {
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                        "Domingo",
                        "Lunes",
                        "Martes",
                        "Miércoles",
                        "Jueves",
                        "Viernes",
                        "Sábado",
                    ],
                },

                months: {
                    shorthand: [
                        "Ene",
                        "Feb",
                        "Mar",
                        "Abr",
                        "May",
                        "Jun",
                        "Jul",
                        "Ago",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dic",
                    ],
                    longhand: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre",
                    ],
                },
            }
        })
    })
</script>
