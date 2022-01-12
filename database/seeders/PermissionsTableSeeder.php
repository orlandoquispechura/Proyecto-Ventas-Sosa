<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //dashboard
        Permission::create([
            'name'          => 'home-dashboard',
            'description'   => 'Puede ver las estadísticas de las ventas y productos mas vendidos.',
        ]);
        //Users
        Permission::create([
            // 'name'          => 'Navegar usuarios',
            'name'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema.',
        ]);

        Permission::create([
            // 'name'          => 'Creación de usuarios',
            'name'          => 'users.create',
            'description'   => 'Crea nuevos usuarios en el sistema.',
        ]);

        Permission::create([
            // 'name'          => 'Ver detalle de usuario',
            'name'          => 'users.show',
            'description'   => 'Ve el detalle de cada usuario del sistema.',            
        ]);
        
        Permission::create([
            // 'name'          => 'Edición de usuarios',
            'name'          => 'users.edit',
            'description'   => 'Edita cualquier dato de un usuario del sistema.',
        ]);
        
        Permission::create([
            // 'name'          => 'Elimina usuario',
            'name'          => 'users.destroy',
            'description'   => 'Elimina cualquier usuario del sistema.',      
        ]);

        //Roles
        Permission::create([
            // 'name'          => 'Navegar roles',
            'name'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema.',
        ]);

        Permission::create([
            // 'name'          => 'Ver detalle de un rol',
            'name'          => 'roles.show',
            'description'   => 'Ve el detalle de cada rol del sistema.',            
        ]);
        
        Permission::create([
            // 'name'          => 'Creación de roles',
            'name'          => 'roles.create',
            'description'   => 'Crea nuevos roles en el sistema.',
        ]);
        
        Permission::create([
            // 'name'          => 'Edición de roles',
            'name'          => 'roles.edit',
            'description'   => 'Edita cualquier dato de un rol del sistema.',
        ]);
        
        Permission::create([
            // 'name'          => 'Elimina roles',
            'name'          => 'roles.destroy',
            'description'   => 'Elimina cualquier rol del sistema.',      
        ]);


        // Categorias
        Permission::create([
            // 'name'=>'Navegar categorías',
            'name'          =>'categorias.index',
            'description'   =>'Lista y navega en las categorías del sistema.',
        ]);
        // Permission::create([
        //     // 'name'=>'Ver detalle de categoría',
        //     'name'          =>'categorias.show',
        //     'description'   =>'Ver el detalle de cada categoría del sistema.',
        // ]);
        Permission::create([
            // 'name'=>'Edición de categorías',
            'name'          =>'categorias.edit',
            'description'   =>'Edita cualquier dato de una categoría del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de categorías',
            'name'          =>'categorias.create',
            'description'   =>'Crea cualquier dato de una categoría del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Elimina categorías',
            'name'          =>'categorias.destroy',
            'description'   =>'Elimina cualquier dato de una categoría del sistema.',
        ]);

        // Clientes
        Permission::create([
            // 'name'=>'Navegar por clientes',
            'name'=>'clientes.index',
            'description'=>'Lista y navega por todos los clientes del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Ver detalle de cliente',
            'name'=>'clientes.show',
            'description'=>'Ve el detalle de cada cliente del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Edición de clientes',
            'name'=>'clientes.edit',
            'description'=>'Edita cualquier dato de un cliente del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de clientes',
            'name'=>'clientes.create',
            'description'=>'Crea cualquier dato de un cliente del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Elimina clientes',
            'name'=>'clientes.destroy',
            'description'=>'Elimina cualquier dato de un cliente del sistema.',
        ]);

          
        // Artículos
        Permission::create([
            // 'name'=>'Navegar por artículos',
            'name'=>'articulos.index',
            'description'=>'Lista y navega por todos los artículos del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Ver detalle de artículo',
            'name'=>'articulos.show',
            'description'=>'Ve en detalle de cada artículo del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Edición de artículos',
            'name'=>'articulos.edit',
            'description'=>'Edita cualquier dato de un artículo del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de artículos',
            'name'=>'articulos.create',
            'description'=>'Crea cualquier dato de un artículo del sistema.',
        ]);

        // Proveedores
        Permission::create([
            // 'name'=>'Navegar por proveedores',
            'name'=>'proveedors.index',
            'description'=>'Lista y navega por todos los proveedores del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Ver detalle de proveedor',
            'name'=>'proveedors.show',
            'description'=>'Ve en detalle cada proveedor del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Edición de proveedores',
            'name'=>'proveedors.edit',
            'description'=>'Edita cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de proveedores',
            'name'=>'proveedors.create',
            'description'=>'Crea cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Elimina proveedores',
            'name'=>'proveedors.destroy',
            'description'=>'Elimina cualquier dato de un proveedor del sistema.',
        ]);

        // Compras
        Permission::create([
            // 'name'=>'Navegar por compras',
            'name'=>'compras.index',
            'description'=>'Lista y navega por todos los compras del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Ver detalle de compra',
            'name'=>'compras.show',
            'description'=>'Ver en detalle cada compra del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de compras',
            'name'=>'compras.create',
            'description'=>'Crea cualquier dato de un compra del sistema.',
        ]);

         // Ventas
        Permission::create([
            // 'name'=>'Navegar por ventas',
            'name'=>'ventas.index',
            'description'=>'Lista y navega por todos los ventas del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Ver detalle de venta',
            'name'=>'ventas.show',
            'description'=>'Ver en detalle cada venta del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de ventas',
            'name'=>'ventas.create',
            'description'=>'Crea cualquier dato de un venta del sistema.',
        ]);

        // Compras pdf
        Permission::create([
            // 'name'=>'Descargar PDF reporte de compras',
            'name'=>'compras.pdf',
            'description'=>'Puede imprimir todos los reportes de las compras en PDF.',
        ]);

        // Ventas pdf
        Permission::create([
            // 'name'=>'Descargar PDF reporte de ventas',
            'name'=>'ventas.pdf',
            'description'=>'Puede imprimir todos los reportes de las ventas en PDF.',
        ]);

        // Empresa
        Permission::create([
            // 'name'=>'Ver datos de la empresa',
            'name'=>'empresas.index',
            'description'=>'Lista y Navega por los datos de la empresa.',
        ]);
        Permission::create([
            // 'name'=>'Edición de empresa',
            'name'=>'empresas.edit',
            'description'=>'Edita cualquier dato de la empresa.',
        ]);
        // Cambiar estado de artículos
        Permission::create([
            // 'name'=>'Cambiar estado de artículo',
            'name'=>'cambiar.estado.articulos',
            'description'=>'Permite cambiar el estado de un artículo.',
        ]);


        // Cambiar estado de la Compra
        Permission::create([
            // 'name'=>'Cambiar estado de compra',
            'name'=>'cambio.estado.compras',
            'description'=>'Permite cambiar el estado de un compra.',
        ]);

        // Cambiar estado de la Venta
        Permission::create([
            // 'name'=>'Cambiar estado de venta',
            'name'=>'cambio.estado.ventas',
            'description'=>'Permite cambiar el estado de un venta.',
        ]);

        // Reporte del día 
        Permission::create([
            // 'name'=>'Reporte por día',
            'name'=>'reports.reportes',
            'description'=>'Permite ver los reportes de las ventas por día y por rango de fecha.',
        ]);


        // Reporte por Fecha 
        Permission::create([
            // 'name'=>'Reporte por fechas',
            'name'=>'reporte.pdf',
            'description'=>'Permite descargar los reportes en un archivo pdf.',
        ]);


    }
}
