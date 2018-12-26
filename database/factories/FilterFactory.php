<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Filter::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
