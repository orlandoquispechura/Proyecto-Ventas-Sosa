<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'user_id',
        'fecha_venta',
        'impuesto',
        'total',
        'estado',
    ];
      // relación uno a muchos  inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

      // relación uno a muchos inversa
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
      // relación uno a muchos 
    public function detalleventas(){
        return $this->hasMany(DetalleVenta::class);
    }
}
