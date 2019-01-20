<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(),
        'content'=>$faker->realText(2000),
        'author_id'=>$faker->numberBetween(1,20),
        'published'=>$faker->numberBetween(0,1),
        'category_id'=>$faker->numberBetween(1,4)
    ];
});
