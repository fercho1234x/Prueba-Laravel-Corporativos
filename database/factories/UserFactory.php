<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'S_Nombre' => $faker->firstName,
        'S_Apellidos' => $faker->lastName,
        'S_FotoPerfilUrl' => $faker->word . '.jpg',
        'S_Activo' => $faker->randomElement([1, 0]),
        'password' => '12345',
        'verified' => $verified = $faker->boolean,
        'verification_token' => $verified == 1 ? null : User::generateVerificationToken(),
    ];
});
