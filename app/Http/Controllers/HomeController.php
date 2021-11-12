<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    } 
    public function index()
    {
        $comprasmes = DB::select('SELECT month(c.fecha_compra) as mes, sum(c.total) as totalmes from compras c where c.estado="VALIDO" group by month(c.fecha_compra) order by month(c.fecha_compra) desc limit 12');
        
        $ventasmes = DB::select('SELECT month(v.fecha_venta) as mes, sum(v.total) as totalmes from ventas v where v.estado="VALIDO" group by month(v.fecha_venta) order by month(v.fecha_venta) desc limit 12');


        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.fecha_venta,"%d/%m/%Y") as dia, sum(v.total) as totaldia from ventas v where v.estado="VALIDO" group by v.fecha_venta order by day(v.fecha_venta) desc limit 15');
        
        $totales = DB::select('SELECT (select ifnull(sum(c.total),0) from compras c where DATE(c.fecha_compra)=curdate() and c.estado="VALIDO") as totalcompra, (select ifnull(sum(v.total),0) from ventas v where DATE(v.fecha_venta)=curdate() and v.estado="VALIDO") as totalventa');
        
        $productosvendidos = DB::select('SELECT a.codigo as codigo, 
        sum(dv.cantidad) as cantidad, a.nombre as nombre , a.id as id , a.stock as stock from articulos a
        inner join detalle_ventas dv on a.id=dv.articulo_id 
        inner join ventas v on dv.venta_id=v.id where v.estado="VALIDO" 
        and year(v.fecha_venta)=year(curdate()) 
        group by a.codigo ,a.nombre, a.id , a.stock order by sum(dv.cantidad) desc limit 10');


        return view('home.welcome', compact('comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));
    }
}
