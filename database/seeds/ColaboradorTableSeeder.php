<?php

use Illuminate\Database\Seeder;
use Codydev\Models\Colaborador;
class ColaboradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Colaborador::truncate();

        $faker = \Faker\Factory::create();

        for($i=0; $i<100; $i++){
            Colaborador::create([

                'nombre' => $faker->name(2),
                'especialidad' => $faker->text(15),
                'foto' => $faker->sentence(),
                'twitter' => $faker->url,
                'github' => $faker->url,
                'linkedin' => $faker->url,
                'correo_electronico' => $faker->email,
                'descripcion' => $faker->text(15)
    
            ]);
        }
       
    }
}
