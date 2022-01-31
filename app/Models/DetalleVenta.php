<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id',
        'articulo_id',
        'cantidad',
        'precio_venta',
        'descuento',
    ];
      // relación uno a muchos  inversa
    public function articulo(){
        return $this->belongsTo(Articulo::class);
    }
}
