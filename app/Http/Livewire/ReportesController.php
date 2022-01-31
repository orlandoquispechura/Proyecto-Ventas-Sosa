<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Venta;
use Carbon\Carbon;

class ReportesController extends Component
{
    public $nombreComponente, $data, $tipoReporte, $userId, $desde, $hasta;
    public function mount()
    {
        $this->nombreComponente = 'Reportes de ventas';
        $this->data = [];
        $this->tipoReporte = 0;
        $this->userId = 0;
    }

    public function render()
    {
        $this->VentasPorFecha();
        return view('livewire.reports.component', [
            'users' => User::OrderBy('name', 'ASC')->get()
        ])->extends('adminlte::page')
            ->section('content');
    }

    public function VentasPorFecha()
    {
        if ($this->tipoReporte == 0) {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d')   . ' 23:59:59';
        } else {
            $from = Carbon::parse($this->desde)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($this->hasta)->format('Y-m-d')   . ' 23:59:59';
        }

        if ($this->tipoReporte == 1 && ($this->desde == '' || $this->hasta == '')) {
            $this->data = Venta::join('users as u', 'u.id', 'ventas.user_id')
                ->select('ventas.*', 'u.name as user')
                ->whereBetween('ventas.fecha_venta', [$from, $to])
                ->get();
            return $this->data;
        }
        if ($this->userId == 0) {
            $this->data = Venta::join('users as u', 'u.id', 'ventas.user_id')
                ->select('ventas.*', 'u.name as user')
                ->whereBetween('ventas.fecha_venta', [$from, $to])
                ->get();
        } else {
            $this->data  = Venta::join('users as u', 'u.id', 'ventas.user_id')
                ->select('ventas.*', 'u.name as user')
                ->whereBetween('ventas.fecha_venta', [$from, $to])
                ->where('user_id', $this->userId)
                ->get();
        }
    }
}
