<?php

namespace Database\Factories;

use App\Models\DetailRent;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailRentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailRent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'duration' => rand(1, 5),
            'room_id' => rand(1, 25),
            'user_id' => rand(1, 5),
        ];
    }
}
