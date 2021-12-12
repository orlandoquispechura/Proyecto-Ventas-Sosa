<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name'=>'Administrador',
            'email'=>'admin@gmail.com',
            'password'=>'$2y$10$vv.HvUrGoDre8hQSdUMdNe.c4UMhfQ3cMEe73En4L31Zjhbk3SbwC',
        ]);

        $admin = Role::create([
            'name'=>'Admin',
            'description'=>'Administrador tiene privilegios de todo el sistema',
        ]);
        $permisos = Permission::pluck('id', 'id')->all();
        
        $admin->syncPermissions($permisos);

        $user->assignRole([$admin->id]);   
    } 
}