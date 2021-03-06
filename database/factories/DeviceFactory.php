<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Device;
use Faker\Generator as Faker;


$faker = \Faker\Factory::create();
\Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);


$factory->define(Device::class, function (Faker $faker) {
    return [
        'brand' => $faker->deviceManufacturer,
        'model' => $faker->star,
        'serial' => $faker->isbn13,
        'description' => $faker->sentence($nbWords = 8, $variableNbWords = true) 
    ];
});
