<?php

use Illuminate\Database\Seeder;
use Codydev\Models\Agenda;
use Carbon\Carbon;
class AgendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agenda::truncate();

            // $faker = \Faker\Factory::create();
            
            // $password = \Hash::make('abel123');

            // Agenda::create([

            //     'name' => $faker->name,
            //     'password' => $password



            // ]);


        $agenda = new Agenda;
        $agenda->nombres = "abel";
        $agenda->apellidos = "arcos perez";
        $agenda->telefono = "0446789878";
        $agenda->sexo = "hombre";
        $agenda->email = "abel302010@hotmail.com";
        $agenda->posicion = "developer backend";
        $agenda->departamento = "D. de sistemas";
        $agenda->salario = 10000;
        $agenda->fechadenacimiento = Carbon::now();
        $agenda->condicion = true;
        $agenda->save();

        $agenda = new Agenda;
        $agenda->nombres = "coy";
        $agenda->apellidos = "chi pech";
        $agenda->telefono = "0446789870";
        $agenda->sexo = "Mujer";
        $agenda->email = "coy302010@hotmail.com";
        $agenda->posicion = "Frontend";
        $agenda->departamento = "D. web";
        $agenda->salario = 10009;
        $agenda->fechadenacimiento = Carbon::now();
        $agenda->condicion = false;
        $agenda->save();

        $agenda = new Agenda;
        $agenda->nombres = "andres";
        $agenda->apellidos = "solis";
        $agenda->telefono = "0446789098";
        $agenda->sexo = "Hombre";
        $agenda->email = "andres@hotmail.com";
        $agenda->posicion = "DBA";
        $agenda->departamento = "D.sistemas";
        $agenda->salario = 15000;
        $agenda->fechadenacimiento = Carbon::now();
        $agenda->condicion = true;
        $agenda->save();

    }
}
