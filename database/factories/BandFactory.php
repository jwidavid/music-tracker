<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Band;
use Faker\Generator as Faker;

$factory->define(Band::class, function (Faker $faker) {    
    return [
        'name' => $faker->unique()->words($nb=rand(2, 3), $asText=true),
        'start_date' => $faker->date($format='Y-m-d', $max='now'),
        'website' => $faker->unique()->url,
        'still_active' => $faker->boolean
    ];
});
