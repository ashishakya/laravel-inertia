<?php

use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Lead::class, 50)->create()->each(function(\App\Lead $lead){
            $lead->reminders()->saveMany(factory(\App\Reminder::class, 2)->make());
        });
    }
}
