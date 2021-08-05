<?php

namespace Database\Seeders;

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
        //Users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de usuarios',
            'slug'          => 'users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ]);


        // Categorias
        Permission::create([
            'name'=>'Navegar categorías',
            'slug'=>'categorias.index',
            'description'=>'Lista y navega por todos los categorías del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de categoría',
            'slug'=>'categorias.show',
            'description'=>'Ver en detalle cada categoría del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de categorías',
            'slug'=>'categorias.edit',
            'description'=>'Editar cualquier dato de un categoría del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de categorías',
            'slug'=>'categorias.create',
            'description'=>'Crea cualquier dato de una categoría del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar categorías',
            'slug'=>'categorias.destroy',
            'description'=>'Eliminar cualquier dato de una categoría del sistema.',
        ]);

        // Clientes
        Permission::create([
            'name'=>'Navegar por clientes',
            'slug'=>'clientes.index',
            'description'=>'Lista y navega por todos los clientes del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de cliente',
            'slug'=>'clientes.show',
            'description'=>'Ver en detalle cada cliente del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de clientes',
            'slug'=>'clientes.edit',
            'description'=>'Editar cualquier dato de un cliente del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de clientes',
            'slug'=>'clientes.create',
            'description'=>'Crea cualquier dato de un cliente del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar clientes',
            'slug'=>'clientes.destroy',
            'description'=>'Eliminar cualquier dato de un cliente del sistema.',
        ]);

          
        // Artículos
        Permission::create([
            'name'=>'Navegar por productos',
            'slug'=>'articulos.index',
            'description'=>'Lista y navega por todos los productos del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de producto',
            'slug'=>'articulos.show',
            'description'=>'Ver en detalle cada producto del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de productos',
            'slug'=>'articulos.edit',
            'description'=>'Editar cualquier dato de un producto del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de productos',
            'slug'=>'articulos.create',
            'description'=>'Crea cualquier dato de un producto del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar productos',
            'slug'=>'articulos.destroy',
            'description'=>'Eliminar cualquier dato de un producto del sistema.',
        ]);


        // Proveedores
        Permission::create([
            'name'=>'Navegar por proveedores',
            'slug'=>'proveedors.index',
            'description'=>'Lista y navega por todos los proveedores del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de proveedor',
            'slug'=>'proveedors.show',
            'description'=>'Ver en detalle cada proveedor del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de proveedores',
            'slug'=>'proveedors.edit',
            'description'=>'Editar cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de proveedores',
            'slug'=>'proveedors.create',
            'description'=>'Crea cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar proveedores',
            'slug'=>'proveedors.destroy',
            'description'=>'Eliminar cualquier dato de un proveedor del sistema.',
        ]);

        // Compras
        Permission::create([
            'name'=>'Navegar por compras',
            'slug'=>'compras.index',
            'description'=>'Lista y navega por todos los compras del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de compra',
            'slug'=>'compras.show',
            'description'=>'Ver en detalle cada compra del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de compras',
            'slug'=>'compras.create',
            'description'=>'Crea cualquier dato de un compra del sistema.',
        ]);

         // Ventas
        Permission::create([
            'name'=>'Navegar por ventas',
            'slug'=>'ventas.index',
            'description'=>'Lista y navega por todos los ventas del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de venta',
            'slug'=>'ventas.show',
            'description'=>'Ver en detalle cada venta del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de ventas',
            'slug'=>'ventas.create',
            'description'=>'Crea cualquier dato de un venta del sistema.',
        ]);

        // Compras pdf
        Permission::create([
            'name'=>'Descargar PDF reporte de compras',
            'slug'=>'compras.pdf',
            'description'=>'Puede descargar todos los reportes de las compras en PDF.',
        ]);

        // Ventas pdf
        Permission::create([
            'name'=>'Descargar PDF reporte de ventas',
            'slug'=>'ventas.pdf',
            'description'=>'Puede descargar todos los reportes de las ventas en PDF.',
        ]);

        /* // Ventas Impresión
        Permission::create([
            'name'=>'Imprimir boleta de venta',
            'slug'=>'sales.print',
            'description'=>'Puede imprimir boletas de todas las ventas.',
        ]);*/


        // Empresa
        Permission::create([
            'name'=>'Ver datos de la empresa',
            'slug'=>'empresas.index',
            'description'=>'Navega por los datos de la empresa.',
        ]);
        Permission::create([
            'name'=>'Edición de empresa',
            'slug'=>'empresas.edit',
            'description'=>'Editar cualquier dato de la empresa.',
        ]);

        /* // impresora 
        Permission::create([
            'name'=>'er datos de la impresora',
            'slug'=>'printers.index',
            'description'=>'Navega por los datos de la impresora.',
        ]);
        Permission::create([
            'name'=>'Edición de impresora',
            'slug'=>'printers.edit',
            'description'=>'Editar cualquier dato de la impresora.',
        ]);
*/

        // Actualizar compras
        Permission::create([
            'name'=>'Subir archivo de compra',
            'slug'=>'upload.compras',
            'description'=>'Puede subir comprobantes de una compra.',
        ]);

        // Cambiar stado de artículos
       /* Permission::create([
            'name'=>'Cambiar estado de producto',
            'slug'=>'cambiar.estado.articulos',
            'description'=>'Permite cambiar el estado de un producto.',
        ]);*/


        // Cambiar estado de la Compra
        Permission::create([
            'name'=>'Cambiar estado de compra',
            'slug'=>'cambio.estado.compras',
            'description'=>'Permite cambiar el estado de un compra.',
        ]);

        // Cambiar estado de la Venta
        Permission::create([
            'name'=>'Cambiar estado de venta',
            'slug'=>'cambio.estado.ventas',
            'description'=>'Permite cambiar el estado de un venta.',
        ]);

        // Reporte del día 
        Permission::create([
            'name'=>'Reporte por día',
            'slug'=>'resportes.dia',
            'description'=>'Permite ver los reportes de ventas por día.',
        ]);


        // Reporte por Fecha 
        Permission::create([
            'name'=>'Reporte por fechas',
            'slug'=>'resporte.fecha',
            'description'=>'Permite ver los reportes por un rango de fechas de las ventas.',
        ]);


    }
}
