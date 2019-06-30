<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Album;
use App\Band;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    $genres = ['Jazz', 'Blues', 'Rock', 'Pop', 'Folk', 'Country', 'Hop', 'Reggae', 'Metal', 'Funk', 'Punk Rock'];
    return [
        'name' => $faker->unique()->words($nb=rand(2, 4), $asText=true),
        'recorded_date' => $faker->date($format='Y-m-d', $max='now'),
        'release_date' => $faker->date($format='Y-m-d', $max='now'),
        'number_of_tracks' => rand(6, 15),
        'label' => $faker->unique()->words($nb=rand(1, 2), $asText=true),
        'producer' => $faker->unique()->words($nb=rand(1, 2), $asText=true),
        'genre' => $genres[rand(0, count($genres)-1)]
    ];
});