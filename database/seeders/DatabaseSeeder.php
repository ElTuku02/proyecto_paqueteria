<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Cliente::factory(200)->create();
        \App\Models\Ciudad::factory(15)->create();
        \App\Models\Repartidor::factory(20)->create(); 
        \App\Models\Envio::factory(100)->create();
    }
}
