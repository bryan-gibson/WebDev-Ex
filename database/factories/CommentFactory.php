<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

/*$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'text' => $faker->text
    ];*/
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->lexify('???? ?????'),
        'text' => $faker->lexify('Hello, this is my comment that says: ???? ?????')
    ];
});
