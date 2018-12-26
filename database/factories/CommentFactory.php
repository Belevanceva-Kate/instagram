<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Image;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
    	'content' => $faker->text($maxNbChars = 255),
        'image_id' => Image::all()->random()->id,
        'user_id' => User::all()->random()->id
    ];
});
