<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'room_id' => function () {
            //     return \App\Models\Room::factory()->create();
            // },
            'link' => $this->faker->imageUrl(1920, 1080, 'room', true),
            'room_id' => $this->faker->unique(true)->numberBetween(1, 25),
        ];
    }
}
