<?php

namespace Database\Seeders;

use App\Models\DetailRent;
use Illuminate\Database\Seeder;

class DetailRentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailRent::factory(25)->create();
    }
}
