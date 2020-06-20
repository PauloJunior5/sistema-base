<?php
use Illuminate\Database\Seeder;
class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paises')->insert(
            [
                'codigo' => '55',
                'pais' => 'Brasil',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '44',
                'pais' => 'Inglaterra',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '47',
                'pais' => 'Noruega',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'codigo' => '595',
                'pais' => 'Paraguai',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
