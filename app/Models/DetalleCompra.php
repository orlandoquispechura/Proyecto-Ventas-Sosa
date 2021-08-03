<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $fillable = [
        'compra_id',
        'articulo_id',
        'cantidad',
        'precio_compra',
        'descuento',
    ];
    public function compra(){
        return $this->belongsTo(Compra::class);
    }
    public function articulo(){
        return $this->belongsTo(Articulo::class);
    }
}
