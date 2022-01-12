<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido_paterno', 
        'apellido_materno', 
        'dni', 
        'direccion',
        'telefono', 
        'celular',
        'email',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
