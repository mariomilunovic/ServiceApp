<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate(); //brise sve stare podatke iz tabele

        Role::create(['name'=>'serviser']);
        Role::create(['name'=>'administrator']);
        Role::create(['name'=>'neaktivan']);

    }
}
