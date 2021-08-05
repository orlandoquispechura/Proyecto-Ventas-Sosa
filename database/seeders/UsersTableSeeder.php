<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'Acceso-total',
        ]);

        $user = User::create([
            'name'=>'Orlando',
            'email'=>'softorlando@gmail.com',
            'password'=>'$2y$10$vv.HvUrGoDre8hQSdUMdNe.c4UMhfQ3cMEe73En4L31Zjhbk3SbwC',
        ]);

        $user->roles()->sync(1);   
    }
}
