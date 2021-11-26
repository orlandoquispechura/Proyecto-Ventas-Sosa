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
          
            'name'          => 'home',
            'description'   => 'Puede ver el dashboard del sistema',
        ]);

        //Users
        Permission::create([
            // 'name'          => 'Navegar usuarios',
            'name'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            // 'name'          => 'Creación de usuarios',
            'name'          => 'users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ]);

        Permission::create([
            // 'name'          => 'Ver detalle de usuario',
            'name'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ]);
        
        Permission::create([
            // 'name'          => 'Edición de usuarios',
            'name'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);
        
        Permission::create([
            // 'name'          => 'Eliminar usuario',
            'name'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ]);

        //Roles
        Permission::create([
            // 'name'          => 'Navegar roles',
            'name'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            // 'name'          => 'Ver detalle de un rol',
            'name'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',            
        ]);
        
        Permission::create([
            // 'name'          => 'Creación de roles',
            'name'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        
        Permission::create([
            // 'name'          => 'Edición de roles',
            'name'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        
        Permission::create([
            // 'name'          => 'Eliminar roles',
            'name'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ]);


        // Categorias
        Permission::create([
            // 'name'=>'Navegar categorías',
            'name'=>'categorias.index',
            'description'=>'Lista y navega por todos los categorías del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Ver detalle de categoría',
            'name'=>'categorias.show',
            'description'=>'Ver en detalle cada categoría del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Edición de categorías',
            'name'=>'categorias.edit',
            'description'=>'Editar cualquier dato de un categoría del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de categorías',
            'name'=>'categorias.create',
            'description'=>'Crea cualquier dato de una categoría del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Eliminar categorías',
            'name'=>'categorias.destroy',
            'description'=>'Eliminar cualquier dato de una categoría del sistema.',
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
            'description'=>'Ver en detalle cada cliente del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Edición de clientes',
            'name'=>'clientes.edit',
            'description'=>'Editar cualquier dato de un cliente del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de clientes',
            'name'=>'clientes.create',
            'description'=>'Crea cualquier dato de un cliente del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Eliminar clientes',
            'name'=>'clientes.destroy',
            'description'=>'Eliminar cualquier dato de un cliente del sistema.',
        ]);

          
        // Artículos
        Permission::create([
            // 'name'=>'Navegar por productos',
            'name'=>'articulos.index',
            'description'=>'Lista y navega por todos los productos del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Ver detalle de producto',
            'name'=>'articulos.show',
            'description'=>'Ver en detalle cada producto del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Edición de productos',
            'name'=>'articulos.edit',
            'description'=>'Editar cualquier dato de un producto del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de productos',
            'name'=>'articulos.create',
            'description'=>'Crea cualquier dato de un producto del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Eliminar productos',
            'name'=>'articulos.destroy',
            'description'=>'Eliminar cualquier dato de un producto del sistema.',
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
            'description'=>'Ver en detalle cada proveedor del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Edición de proveedores',
            'name'=>'proveedors.edit',
            'description'=>'Editar cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Creación de proveedores',
            'name'=>'proveedors.create',
            'description'=>'Crea cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            // 'name'=>'Eliminar proveedores',
            'name'=>'proveedors.destroy',
            'description'=>'Eliminar cualquier dato de un proveedor del sistema.',
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
            'description'=>'Puede descargar todos los reportes de las compras en PDF.',
        ]);

        // Ventas pdf
        Permission::create([
            // 'name'=>'Descargar PDF reporte de ventas',
            'name'=>'ventas.pdf',
            'description'=>'Puede descargar todos los reportes de las ventas en PDF.',
        ]);

        /* // Ventas Impresión
        Permission::create([
            'name'=>'Imprimir boleta de venta',
            'name'=>'sales.print',
            'description'=>'Puede imprimir boletas de todas las ventas.',
        ]);*/


        // Empresa
        Permission::create([
            // 'name'=>'Ver datos de la empresa',
            'name'=>'empresas.index',
            'description'=>'Navega por los datos de la empresa.',
        ]);
        Permission::create([
            // 'name'=>'Edición de empresa',
            'name'=>'empresas.edit',
            'description'=>'Editar cualquier dato de la empresa.',
        ]);

        /* // impresora 
        Permission::create([
            'name'=>'er datos de la impresora',
            'name'=>'printers.index',
            'description'=>'Navega por los datos de la impresora.',
        ]);
        Permission::create([
            'name'=>'Edición de impresora',
            'name'=>'printers.edit',
            'description'=>'Editar cualquier dato de la impresora.',
        ]);
*/

        // Actualizar compras
        Permission::create([
            // 'name'=>'Subir archivo de compra',
            'name'=>'upload.compras',
            'description'=>'Puede subir comprobantes de una compra.',
        ]);

        // Cambiar stado de artículos
        Permission::create([
            // 'name'=>'Cambiar estado de producto',
            'name'=>'cambiar.estado.articulos',
            'description'=>'Permite cambiar el estado de un producto.',
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
            'name'=>'resporte.dia',
            'description'=>'Permite ver los reportes de ventas por día.',
        ]);


        // Reporte por Fecha 
        Permission::create([
            // 'name'=>'Reporte por fechas',
            'name'=>'resporte.fecha',
            'description'=>'Permite ver los reportes por un rango de fechas de las ventas.',
        ]);


    }
}
