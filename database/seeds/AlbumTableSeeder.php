<?php

use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        DB::table('album')->insert([
            'band_id' => 1,
            'name' => "Singin' and Swingin'",
            'release_date' => '1956-01-01',
            'number_of_tracks' => 12,
            'label' => 'Decca',
            'genre' => 'Jazz, Pop'
        ]);

        DB::table('album')->insert([
            'band_id' => 1,
            'name' => 'My Gal Sal - Barber Shop Ballads',
            'release_date' => '1942-01-01',
            'number_of_tracks' => 10,
            'label' => 'Decca',
            'genre' => 'Pop'
        ]);

        DB::table('album')->insert([
            'band_id' => 1,
            'name' => 'Glow With The Mills Brothers',
            'release_date' => '1959-03-28',
            'number_of_tracks' => 12,
            'label' => 'Decca',
            'genre' => 'Jazz, Pop'
        ]);

        DB::table('album')->insert([
            'band_id' => 2,
            'name' => 'At The Café Rouge',
            'release_date' => '1976-01-01',
            'number_of_tracks' => 10,
            'label' => 'Windmill',
            'genre' => 'Swing, Big Band'
        ]);

        DB::table('album')->insert([
            'band_id' => 3,
            'name' => 'Frankly Sentimental',
            'release_date' => '1949-01-01',
            'number_of_tracks' => 8,
            'label' => 'Columbia',
            'genre' => 'Jazz, Pop'
        ]);

        DB::table('album')->insert([
            'band_id' => 3,
            'name' => 'This Is Sinatra!',
            'release_date' => '1956-01-01',
            'number_of_tracks' => 12,
            'label' => 'Capitol Records',
            'genre' => 'Big Band, Swing'
        ]);

        DB::table('album')->insert([
            'band_id' => 4,
            'name' => 'Unforgettable',
            'release_date' => '1952-01-01',
            'number_of_tracks' => 8,
            'label' => 'Capitol Records',
            'genre' => 'Jazz, Pop'
        ]);

        DB::table('album')->insert([
            'band_id' => 4,
            'name' => 'Sings For Two In Love',
            'release_date' => '1953-01-01',
            'number_of_tracks' => 12,
            'label' => 'Capitol Records',
            'genre' => 'Jazz, Pop'
        ]);
    }
}
