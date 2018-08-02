<?php

use Faker\Generator as Faker;

$factory->define(App\Episode::class, function (Faker $faker) {

    return [
        'download_url' => 'www.podcast.co/music/' . str_random(10) . '.mp3',
        'title' => $faker->text(20),
        'description' => $faker->text(200),
        'episode_number' => rand(20, 2000),
        'episode_number' => rand(0, 10),
    ];
});
