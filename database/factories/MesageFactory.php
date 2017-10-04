<?php

use Faker\Generator as Faker;

$factory->define(\Cmgmyr\Messenger\Models\Message::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => \App\User::first()->id,
        'thread_id' => \Cmgmyr\Messenger\Models\Thread::first()->id,
    ];
});
