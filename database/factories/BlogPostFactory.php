<?php

namespace Database\Factories;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
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
            'alt_text' => (string)$this->faker->sentences($nb = 1, $asText = true, true),
            'post_date' => $this->faker->date('Y_m_d'),
            'content' => (string)$this->faker->paragraphs(5, true),
            'post_image' => (string)$this->faker->name(1, true),
            'category_id' => $this->faker->randomDigitNot(0),
            'slug' => Str::slug($title, '-'),
            'meta_description' => (string)$this->faker->sentences($nbWords = 1, $variableNbWords = true, true),
            'meta_title' => (string)$this->faker->sentences($nbWords = 1, $variableNbWords = true, true),
            'keywords' => (string)$this->faker->words($nbWords = 1, $variableNbWords = true, true),
            'status' => 1,
            'featured' => 1,
            'views' => rand(100,1000),
            'is_deleted' => 0,
            'created_by' => $this->faker->randomDigitNot(0),
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' =>  now(),
        ];
    }
}
