<?php

namespace Database\Seeders;

use App\Models\ItemList;
use Illuminate\Database\Seeder;

class ItemListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemList::factory(5)->create();
    }
}
