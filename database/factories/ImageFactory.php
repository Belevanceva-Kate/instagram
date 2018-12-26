<?php

use Faker\Generator as Faker;
use App\Models\User;

$factory->define(App\Models\Image::class, function (Faker $faker) {
    return [
        'path' => $faker->file(
        	$sourceDir = './public/avatars', 
        	$targetDir = './public/storage/img', 
        	$fullPath = false),
        'name' => $faker->word,
        'description' => $faker->text($maxNbChars = 255),
        'user_id' => User::all()->random()->id
    ];
});
