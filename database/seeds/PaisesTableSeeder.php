<?php
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
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
                'pais' => 'Brasil'
            ],
            [
                'codigo' => '44',
                'pais' => 'Inglaterra'
            ],
            [
                'codigo' => '47',
                'pais' => 'Noruega'
            ],
            [
                'codigo' => '595',
                'pais' => 'Paraguai'
            ]
        );
    }
}
