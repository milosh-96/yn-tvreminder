<?php

use Faker\Generator as Faker;

$factory->define(App\Reminder::class, function (Faker $faker) {
    $hash = substr(md5($faker->numberBetween(5000,15000) . '-'.date("Y-m-d H:i:s")),0,8);
    return [
            'hash'=>$hash,
            //'user_id'=>$this->user_id,
            //'show_id'=>$this->show_id,
            'weekly'=>$faker->boolean($chanceOfGettingTrue = 70),
            'date_range_start'=>$faker->dateTime($max = '+2 years',$timezone = 'Europe/Belgrade'),
            'date_range_end'=>$faker->dateTimeBetween($startDate = 'now', $endDate = '+5 years', $timezone = 'Europe/Belgrade'),
            'monday'=>$faker->boolean($chanceOfGettingTrue = 70),
            'tuesday'=>$faker->boolean($chanceOfGettingTrue = 70),
            'wednesday'=>$faker->boolean($chanceOfGettingTrue = 70),
            'thursday'=>$faker->boolean($chanceOfGettingTrue = 70),
            'friday'=>$faker->boolean($chanceOfGettingTrue = 70),
            'saturday'=>$faker->boolean($chanceOfGettingTrue = 70),
            'sunday'=>$faker->boolean($chanceOfGettingTrue = 70),
            'onetime_event'=>$faker->boolean($chanceOfGettingTrue = 20),
            'onetime_date'=>$faker->dateTime($max = '+2 years',$timezone = 'Europe/Belgrade'),
            'start_time'=>$faker->time(),
            'end_time'=>$faker->time(),
            'duration'=>$faker->numberBetween(20,500),
            'tv'=>$faker->company,
            'email_notification'=>$faker->boolean($chanceOfGettingTrue = 90),
            'push_notification'=>$faker->boolean($chanceOfGettingTrue = 95),
            'sms_notification'=>$faker->boolean($chanceOfGettingTrue = 20)
    ];
});



            