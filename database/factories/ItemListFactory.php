<?php

namespace Database\Factories;

use App\Models\ItemList;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => rand(1, 25),
            'wishlist_id' => rand(1, 5),
            'qty' => rand(1, 5),
        ];
    }
}
