<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airlines')->insert([
            'name' => 'US Bangla',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Novo Air',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Others',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Bangladesh Biman',

        ]);
        DB::table('airlines')->insert([
            'name' => 'AmyBd',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Regent Airways',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Share Trip',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Flyhub',

        ]);
        DB::table('airlines')->insert([
            'name' => 'B2B 24tkt',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Spice Jet',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Indigo',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Air Arabia',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Fly Dubai',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Emirates',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Qatar Airways',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Salam Air',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Oman Air',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Saudia Air',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Air Asia',

        ]);
        DB::table('airlines')->insert([
            'name' => 'Air India',

        ]);
        
        

    }
}
