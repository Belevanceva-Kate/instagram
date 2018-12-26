<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Image;

$factory->define(App\Models\Like::class, function (Faker $faker) {
    return [
        'image_id' => Image::all()->random()->id,
        'user_id' => User::all()->random()->id
    ];
});
