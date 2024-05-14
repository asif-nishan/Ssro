<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'SSRO',
            'email' => 'ssro@gmail.com',
            'phone_number' => '0181818181',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'Eradul Haque',
            'email' => 'bhutto@gmail.com',
            'phone_number' => '01936708485',
            'email_verified_at' => now(),
            'password' =>  Hash::make("bhutto@123"), // password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'CTG SADAR REGISTRY',
            'email' => 'ctgsadarregisrtyoffice23@gmail.com',
            'phone_number' => '01819338952',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
