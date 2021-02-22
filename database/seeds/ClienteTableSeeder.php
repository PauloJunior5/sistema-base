<?php

use Illuminate\Database\Seeder;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Pais::class, 100)->create();
        factory(App\Models\Estado::class, 100)->create();
        factory(App\Models\Cidade::class, 100)->create();
        factory(App\Models\Cliente::class, 100)->create();
    }
}
