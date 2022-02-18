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
            'name' => $this->faker->name(),
            'dob'=>$this->faker->dateTimeBetween('-50 years', '-12 years', null),
//            'avtar'=>null,
            'email' => $this->faker->unique()->safeEmail(),
            'mobile' => rand(9000000000,9990000000),
            'social_network' => $this->faker->randomElement(['EMAIL', 'GOOGLE', 'TWITTER']),
            'email_verified_at' => $this->faker->boolean(50) ? null : now(),
            'mobile_verified_at' => $this->faker->boolean(50) ? null : now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
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
