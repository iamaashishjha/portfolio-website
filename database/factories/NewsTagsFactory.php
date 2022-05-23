<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class NewsTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentences(1, true);
        $slug = Str::slug($title, '-');
        return [
            'title' => $this->faker->words(1, true),
            'description' => $this->faker->sentences(1, true),
            'tag_image' => $this->faker->sentences(1, true),
            'slug' => Str::slug($this->faker->sentences(1, true), '-'),
            'meta_description' => $this->faker->sentences(1, true),
            'meta_title' => $this->faker->sentence(6, true),
            'keywords' => $this->faker->words(6, true),
            'status' => 1,
            'is_deleted' => 0,
            'created_by' => 1,
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' =>  now(),
        ];
    }
}
