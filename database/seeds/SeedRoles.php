<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class SeedRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('roles')->delete();

        Role::create([
            'name'   => 'administrador'
        ]);

        Role::create([
            'name'   => 'logistica'
        ]);

        Role::create([
            'name'   => 'ventas'
        ]);

        Role::create([
            'name'   => 'coordinacion'
        ]);

        Role::create([
            'name'   => 'cliente'
        ]);
    }
}