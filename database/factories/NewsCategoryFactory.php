<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = (string)$this->faker->sentence($nbWords = 1, $variableNbWords = true, true);
        return [
            'title' => $title,
            'description' => (string)$this->faker->sentences($nb = 1, $asText = true, true),
            'category_image' => (string)$this->faker->name(1, true),
            'slug' => Str::slug($title, '-'),
            'meta_description' => (string)$this->faker->sentences($nbWords = 1, $variableNbWords = true, true),
            'meta_title' => (string)$this->faker->sentences($nbWords = 1, $variableNbWords = true, true),
            'keywords' => (string)$this->faker->words($nbWords = 1, $variableNbWords = true, true),
            'status' => 1,
            'is_deleted' => 0,
            'created_by' => 1,
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' =>  now(),
        ];
    }
}
