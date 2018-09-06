<?php
use Faker\Generator as Faker;
$factory->define(\App\Models\Application::class, function (Faker $faker) {
    return [
        'purpose' => $faker->sentence,
        'usage' => $faker->boolean,
        'location' => $faker->address,
        'total_participants' => $faker->randomElement(range(5, 30)),
        'started_at' => now()->addMonths(2),
        'ended_at' => now()->addMonths(2)->addDays(3),
    ];
});