<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'bio' => $faker->text,
        'url' => $faker->url,
        'picture' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdS1GOi409lLlFNMWZmvRorYtN9_3VCIlYx9g1xGZbFaEQTIla', //$faker->imageUrl(400, 400),
        'phone' => $faker->phoneNumber,
        'gender' => 'male'
    ];
});
