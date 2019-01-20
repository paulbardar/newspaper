<?php

use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        'firstname'=>$faker->firstName,
        'lastname'=>$faker->lastName,
        'phone'=>$faker->phoneNumber,
        'country'=>$faker->country,
        'region'=>$faker->streetName,
        'city'=>$faker->city,
        'address'=>$faker->address,
        'sex'=>$faker->randomElement(['undefined','male','female'])
    ];
});
