<?php

use Illuminate\Database\Seeder;

class directorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directorios')->insert([
            [
                'nombre' => 'Yariana Ramos',
                'direccion' => 'El Valle',
                'telefono' => 1111111,
                'foto' => null
            ],
            [
                'nombre' => 'Johan Castillo',
                'direccion' => 'Petare',
                'telefono' => 121212,
                'foto' => null
            ],
            [
                'nombre' => 'Yoiberth Paredes',
                'direccion' => 'Los Cortijos',
                'telefono' => 23232,
                'foto' => null
            ],
            [
                'nombre' => 'Pedro Saporiti',
                'direccion' => 'La California',
                'telefono' => 34343,
                'foto' => null
            ]
        ]);
    }
}
