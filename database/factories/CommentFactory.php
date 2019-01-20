<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1,10),
        'comment'=>$faker->realText(200),
        'published'=>$faker->numberBetween(0,1)
    ];
});
