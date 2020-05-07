<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lead;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(
    \App\Reminder::class,
    function (Faker $faker) {
        $dob = \Carbon\Carbon::parse($faker->dateTime);
        return [
            'user_id'               => 1,
            'reminder'=>$faker->realText(100),
            'reminder_date'=>Arr::random([$faker->dateTime, today()]),
            'status'=>Arr::random(['completed', 'pending']),
        ];
    }
);
