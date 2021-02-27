<?php

namespace Database\Seeders;

use App\Models\FacilityRoom;
use Illuminate\Database\Seeder;

class RoomFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FacilityRoom::factory(25)->create();
    }
}
