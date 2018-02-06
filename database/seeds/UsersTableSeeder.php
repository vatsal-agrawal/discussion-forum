<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'avatar' => asset('images/img.png'),
            'admin' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'vatsal',
            'email' => 'vatsal@gmail.com',
            'password' => bcrypt('vatsal'),
            'avatar' => asset('images/img.png'),
        ]);
    }
}
