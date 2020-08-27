<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetAddress,
        'neighborhood' => 'Las Flores',
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'postalCode' => $faker->postcode,
        'outdoorNumber' => $faker->buildingNumber,
        'interiorNumber' => $faker->buildingNumber,
        'references' => $faker->sentences(1,true),
        'typeAddress' => $faker->randomElement(['casa','trabajo'])
    ];
});
