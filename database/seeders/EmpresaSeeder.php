<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nombre_negocio'=>'Mueblería SOSA',
            'descripcion'=>'Venta de muebles del hogar',
            'logo'=>'logo.png',
            'mail'=>'sosa-muebles@gmail.com',
            'direccion'=>'Satélite Norte Av. Velasco C/ Mexico S/N',
            'nit'=>'1015447026',
        ]);
    }
}
