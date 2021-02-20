<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => Str::random(10),
            'email' => 'lamvantan03@gmail.com',
            'password' => bcrypt('123123'),
            'phone' =>'0792219129',
            'gender' => 1,
            'birthday' => '2000-08-12',
            'address' =>'Quang nam',
            'permission' =>1
        ]);
    }
}
