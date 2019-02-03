<?php

use Faker\Generator as Faker;
$photos = [];

for ($i = 2; $i <=34; $i++) {
    $photos[] = 'space2_' . ($i < 10 ? '0'.$i : $i) . '.JPG';
}

$factory->define(App\Photo::class, function (Faker $faker) use ($photos) {
    return [
        'name' => $photos[$faker->numberBetween(0, 32)]
    ];
});
