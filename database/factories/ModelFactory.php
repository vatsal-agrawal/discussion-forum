<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Channel::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->name,
    ];
});

$factory->define(App\Discussion::class, function (Faker\Generator $faker) {
        $name = $faker->name;
    return [
        'title' => $name,
        'content' => $faker->paragraph,
        'slug' => str_slug($name),
        'user_id' => $faker->numberBetween(1,2),
        'channel_id'=> $faker->numberBetween(1,10)
    ];
});

$factory->define(App\Reply::class, function (Faker\Generator $faker) {

    return [
        'content' => $faker->paragraph,
        'discussion_id' => $faker->numberBetween(1,4),
        'user_id' => $faker->numberBetween(1,2),
    ];
});
