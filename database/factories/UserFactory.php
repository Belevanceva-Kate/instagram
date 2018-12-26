<?php

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

$factory->define(App\Models\User::class, function (Faker $faker) {
	$gender = $faker->randomElement(['male', 'female']);
    return [
        'name' => $faker->name($gender),
        'nick' => $faker->userName,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'about' => $faker->text($maxNbChars = 255),
        'sex' => $gender,
        // 'avatar' => $faker->file(
        // 	$sourceDir = 'C:\Programs\OSPanel\domains\beetroot\instagram-2\public\avatars', 
        // 	$targetDir = './public/storage/img', false),
        'email' => $faker->unique()->email,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'remember_token' => str_random(10),
    ];
});
