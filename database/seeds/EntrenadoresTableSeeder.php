<?php

use Illuminate\Database\Seeder;
use Codydev\Models\Entrenador;
class EntrenadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entrenador::truncate();

        $faker = \Faker\Factory::create();

        for($i=0; $i < 50; $i++){

            Entrenador::create([
                'nombre' => $faker->sentence(2),
                'foto' => 'img/profile-picture.png'

            ]);
        }
    }
}
