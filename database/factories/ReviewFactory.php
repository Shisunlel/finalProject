<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'review_detail' => $this->faker->paragraph,
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'user_id' => $this->faker->numberBetween(1, 5),
            'room_id' => $this->faker->numberBetween(1, 25),
        ];
    }
}
