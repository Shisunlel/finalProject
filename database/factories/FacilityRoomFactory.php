<?php

namespace Database\Factories;

use App\Models\FacilityRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FacilityRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => rand(1, 25),
            'facility_id' => rand(1, 10),
        ];
    }
}
