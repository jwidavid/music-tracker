<?php

use Illuminate\Database\Seeder;

class BandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Band')->delete();

        factory(App\Band::class, 5)->create()->each(function ($band) {
            $band->save();
        });
        
        // DB::table('band')->insert([
        //     'name' => 'The Mills Brothers',
        //     'start_date' => '1928-01-01',
        //     'website' => 'https://en.wikipedia.org/wiki/The_Mills_Brothers'
        // ]);

        // DB::table('band')->insert([
        //     'name' => 'Glenn Miller',
        //     'start_date' => '1923-08-01',
        //     'website' => 'https://en.wikipedia.org/wiki/Glenn_Miller'
        // ]);

        // DB::table('band')->insert([
        //     'name' => 'Frank Sinatra',
        //     'start_date' => '1935-01-01',
        //     'website' => 'https://en.wikipedia.org/wiki/Frank_Sinatra'
        // ]);

        // DB::table('band')->insert([
        //     'name' => "Nat 'King' Cole",
        //     'start_date' => '1934-01-01',
        //     'website' => 'https://en.wikipedia.org/wiki/Nat_King_Cole'
        // ]);
    }
}
