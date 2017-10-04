<?php

use Faker\Generator as Faker;

$factory->define(\Cmgmyr\Messenger\Models\Participant::class, function (Faker $faker) {
    return [
        'thread_id' => \Cmgmyr\Messenger\Models\Thread::first()->id,
        'user_id' => \App\User::inRandomOrder()->first()->id
    ];
});
