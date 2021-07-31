<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'address' => $this->faker->address,
            'qty' => $this->faker->randomDigitNotNull,
            'price' => $this->faker->randomFloat(2, 15, 35),
            'guest' => $this->faker->numberBetween(1, 5),
            'user_id' => rand(1, 5),
            'created_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
