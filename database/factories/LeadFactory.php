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
    Lead::class,
    function (Faker $faker) {
        $dob = \Carbon\Carbon::parse($faker->dateTime);

        return [
            'name'               => $faker->name,
            'email'              => $faker->unique()->safeEmail,
            'phone'              => $faker->phoneNumber,
            'interested_package' => Arr::random(['Monthly Package', 'Yearly Package']),
            'dob'                => $dob,
            'age'                => $dob->age,
            'branch_id'          => 1,
            'added_by'           => 1,
        ];
    }
);
