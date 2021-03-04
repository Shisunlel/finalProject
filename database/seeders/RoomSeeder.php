<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create()->each(function ($user) {
        //     $user->rooms()->saveMany(
        //         \App\Models\Room::factory(5)->make(['user_id' => $user])
        //     );
        // });
        // \App\Models\Image::factory(5)->create();
        // \App\Models\User::factory()->has(\App\Models\Room::factory()->count(10))->create();
        // $user = \App\Models\User::factory(5)->create();
        // $room = $user->each(function ($user) {
        //     \App\Models\Room::factory(5)->create(['user_id' => $user]);
        // });
        // $image = $room->each(function ($room) {
        //     \App\Models\Image::factory(5)->create(['room_id' => $room]);
        // });
        Room::factory(25)->create();
    }
}
