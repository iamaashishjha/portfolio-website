<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->name(),
            'name_lc' => $this->faker->name(),
            'email' => 'mail.aashishjha@gmail.com',
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'created_by' => 1,
        ];
    }
}
