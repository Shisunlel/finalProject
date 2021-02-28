<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            RoomSeeder::class,
            ReviewSeeder::class,
            ImageSeeder::class,
            RentSeeder::class,
            DetailRentSeeder::class,
            FacilitySeeder::class,
            RoomFacilitySeeder::class,
            WishlistSeeder::class,
            ItemListSeeder::class,
        ]);
        // $user = \App\Models\User::factory(5)->create();
        // $room = $user->each(function ($user) {
        //     \App\Models\Room::factory(5)->create(['user_id' => $user]);
        // });
        // $image = $room->each(function ($room) {
        //     \App\Models\Image::factory(5)->create(['room_id' => $room]);
        // });

    }
}
