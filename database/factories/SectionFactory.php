<?php

use Faker\Generator as Faker;

$factory->define(App\Section::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'text' => $faker->text
    ];
});
