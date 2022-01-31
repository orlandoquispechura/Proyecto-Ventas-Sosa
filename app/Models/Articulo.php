<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'nombre', 'stock', 'imagen', 'precio_venta', 'estado', 'categoria_id', 'proveedor_id',];

    //  relación  uno a  mucho inversa
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    //  relación  uno a  mucho inversa
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
