<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\Codydev\Models\Agenda::class, function (Faker $faker) {
    return [

        'nombres' => $this->faker->name,
        'apellidos' => $this->faker->text(150),
        'telefono' => 9811713316,
        'sexo' => $this->faker->text(5),
        'email' => $this->faker->email,
        'posicion' => $this->faker->text(6),
        'departamento' => $this->faker->sentence(),
        'salario' => 15000,
        'fechadenacimiento' => $this->faker->date,
        'condicion' => $this->faker->boolean
        
    ];
});
