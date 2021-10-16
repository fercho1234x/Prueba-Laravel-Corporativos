<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corporativo;
use App\USer;
use Faker\Generator as Faker;

$factory->define(Corporativo::class, function (Faker $faker) {

    $usuario_id = User::all()->random()->id;

    return [
        'S_NombreCorto' => $faker->company,
        'S_NombreCompleto' => $faker->company . ' ' . $faker->company,
        'S_LogoURL' => $faker->imageUrl(),
        'S_DBName' => $faker->firstName,
        'S_DBUsuario' => $faker->userName,
        'S_DBPassword' => $faker->password,
        'S_SystemUrl' => $faker->word,
        'S_Activo' => $faker->randomElement([1, 0]),
        'D_FechaIncorporacion' => $faker->dateTimeBetween('-10 years', $endDate = 'now'),
        'usuario_id' => $usuario_id,
        'FK_Asignado_id' => $usuario_id
    ];
});
