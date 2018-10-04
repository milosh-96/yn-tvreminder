<?php

use Faker\Generator as Faker;

$factory->define(App\Show::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug_title = &$title;
    $hash = substr(md5($slug_title . '-'. date("Y-m-d H:i:s")),0,8);
    $slug = str_slug($slug_title);
    return [
            'hash'=>$hash,
            'title'=>$title,
            'user_id'=>App\User::all()->random()->id,
            'slug'=>$slug,
            'description'=>$faker->paragraph,
            'cover_url'=>$faker->imageUrl(),
            'public'=>$faker->boolean($chanceOfGettingTrue = 50)
    ];
});
