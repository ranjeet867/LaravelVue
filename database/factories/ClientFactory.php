<?php

use Faker\Generator as Faker;
use App\Client;

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

$factory->define(Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->address,
        'dob' => $faker->date('d-m-Y'),
        'mobile' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
        'nationality' => $faker->country,
        'gender' => $faker->randomElement(['Male','Female']),
        'city' => $faker->city,
        'country' => $faker->country,
        'zip' => $faker->postcode,
        'state' => $faker->state
    ];
});
