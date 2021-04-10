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
            'rent_id' => $this->faker->unique(true)->numberBetween(1, 25),
            'housenumber' => $this->faker->randomNumber(5, false),
            'street' => $this->faker->streetName(),
            'commune' => $this->faker->state(),
            'district' => $this->faker->cityPrefix(),
            'province' => $this->faker->randomElement(['Phnom Penh', 'Kampong Cham', 'Siem Reap', 'Kampong Thom', 'Koh Kong', 'Mondulkiri']),
            'cost' => $this->faker->randomFloat(2, 100, 900),
            'total' => $this->faker->randomFloat(2, 100, 900),
        ];
    }
}
