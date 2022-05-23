<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->name,
            'user_name' => $this->faker->userName,
            'zip_code'  => $this->faker->postcode,
            'email'     => $this->faker->unique()->safeEmail,
            'password'  => bcrypt($this->faker->password),
        ];
    }
}
