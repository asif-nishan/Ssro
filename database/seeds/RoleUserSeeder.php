<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            'role_id' => Role::OPERATOR,
            'user_id' => '1'
        ]);
        DB::table('role_user')->insert([
            'role_id' => Role::ADMIN,
            'user_id' => '2'
        ]);
        DB::table('role_user')->insert([
            'role_id' => Role::OPERATOR,
            'user_id' => '3'
        ]);
    }
}
