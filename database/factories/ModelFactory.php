<?php

/*
|--------------------------------------------------------------------------
| Models Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Models factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CursoLaravel\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CursoLaravel\Produtos::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'cod' => $faker->randomNumber(6),

    ];
});
