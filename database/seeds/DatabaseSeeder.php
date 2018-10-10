<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // FIRST //
        factory(App\User::class, 50)->create();
        //factory(App\Show::class, 200)->create();
        //factory(App\Reminder::class,400)->create();

        // THEN //
        factory(App\Show::class, 200)->create()->each(function ($show) {
            factory(App\Reminder::class, 2)->create([
                'user_id' => $show->user_id,
                'show_id' => $show->id
            ]);
        });
    }
}
