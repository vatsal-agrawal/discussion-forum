<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        factory(App\Channel::class, 10)->create();
        factory(App\Discussion::class, 4)->create();
        factory(App\Reply::class, 4)->create();
    }
}