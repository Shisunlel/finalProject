<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // \App\Models\User::factory()->create();
        // \App\Models\User::factory(5)->create()->each(function ($user) {
        //     $room = \App\Models\Room::factory(5)->make();
        //     $user->room()->saveMany($room);
        // });
        User::factory(5)->create();
    }
}
