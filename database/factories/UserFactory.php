<?php

namespace Database\Factories;

use App\Helpers\CommonHelpers;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'phone' => $this->faker->unique()->numerify('080########'),
            'identity' => '3062' . time() . rand(10, 99) . $this->faker->randomNumber(8),
            'role' => 'Artisan',
            'is_admin' => 0,
            'status' => 1,
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
                'status' => 0,
            ];
        });
    }

    /**
     * Create an admin user.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_admin' => 1,
                'role' => 'Admin',
            ];
        });
    }

    /**
     * Create an employer user.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function employer()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_admin' => 2,
                'role' => 'Employer',
            ];
        });
    }

    /**
     * Create an artisan/freelancer user.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function artisan()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_admin' => 0,
                'role' => 'Artisan',
            ];
        });
    }
}
