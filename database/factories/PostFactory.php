<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'caption' => $faker->sentence(3),
        'description' => $faker->text,
        'picture' => 'https://s3.reutersmedia.net/resources/r/?d=20190502&i=RCV006O97&w=&r=RCV006O97&t=2', //$faker->imageUrl(1200, 1200),
        'user_id' => 0
    ];
});
