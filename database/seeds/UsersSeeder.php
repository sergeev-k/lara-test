<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Todo : Нету в нем необходимости
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '1234',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => '1234',
            ],
        ]);
    }
}
