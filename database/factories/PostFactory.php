<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $imageDownload = $faker->image(public_path('\images'), 720, 480);
    $imagePath     = explode('\\', $imageDownload);
    $imageName     = end($imagePath);

    return [
        'title'   => $faker->sentence,
        'body'    => $faker->paragraph,
        'images'  => $imageName,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
