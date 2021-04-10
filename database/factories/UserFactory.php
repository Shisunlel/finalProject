<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'id_card' => $this->faker->imageUrl(500, 500, 'users', true),
            'phone_number' => $this->faker->unique()->randomNumber(9, true),
            'housenumber' => $this->faker->randomNumber(5, false),
            'street' => $this->faker->streetName(),
            'commune' => $this->faker->state(),
            'district' => $this->faker->cityPrefix(),
            'province' => $this->faker->randomElement(['Phnom Penh', 'Kampong Cham', 'Siem Reap', 'Kampong Thom', 'Koh Kong', 'Mondulkiri']),
            'dob' => $this->faker->date(),
            'profile' => $this->faker->imageUrl(500, 500, 'user', true),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
