<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;


$factory->define(App\Band::class, function (Faker $faker) {    
    return [
        'name' => $faker->unique()->words($nb=3, $asText=true),
        'start_date' => $faker->date($format='Y-m-d', $max='now'),
        'website' => $faker->unique()->url,
        'still_active' => $faker->boolean
    ];
});
