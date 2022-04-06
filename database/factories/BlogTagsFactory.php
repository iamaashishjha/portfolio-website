<?php

namespace Database\Factories;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $faker = Faker\Factory::create();
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
            'created_by' => $this->faker->randomDigitNot(0),
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' =>  now(),
        ];
        
    }
}
