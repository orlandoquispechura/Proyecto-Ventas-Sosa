<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = ['razon_social', 'nit', 'email', 'direccion', 'telefono','celular'];

    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }
    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
}
