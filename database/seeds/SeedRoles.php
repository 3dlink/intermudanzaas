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
            'name'   => 'operativo'
        ]);

        Role::create([
            'name'   => 'cliente'
        ]);
    }
}