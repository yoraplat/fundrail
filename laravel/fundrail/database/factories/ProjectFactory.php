<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 100),
        'intro' => $faker->text($maxNbChars = 200),
        'content' => $faker->text($maxNbChars = 250),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'category_id' => $faker->numberBetween($min = 1, $max = 5),
        'credit_goal' => $faker->numberBetween($min = 20, $max = 20000),
        'initial_time' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
        'final_time' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
        
    ];
});
