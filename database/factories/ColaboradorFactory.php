<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\Codydev\Models\Colaborador::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'especialidad' => $faker->sentence(4),
        'foto' => 'img/picture-profile.png',
        'twitter' => $faker->url,
        'github' => $faker->url,
        'linkedin' => $faker->url,
        'correo_electronico' => $faker->email,
        'descripcion' => $faker->text
    ];
});
