<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopupNoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => (string)$this->faker->sentence($nbWords = 1, $variableNbWords = true, true),
            'type' => rand(3,4),
            'content' => (string)$this->faker->paragraphs(5, true),
            'created_by' => 1
        ];
    }
}
