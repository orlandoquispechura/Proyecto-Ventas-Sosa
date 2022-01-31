<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'proveedor_id',
        'user_id',
        'fecha_compra',
        'impuesto',
        'total',
        'estado',
        'picture',
    ];
      // relación uno a muchos  inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
      // relación uno a muchos inversa
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
      // relación uno a muchos 
    public function detallecompras(){
        return $this->hasMany(DetalleCompra::class);
    }
    
}
