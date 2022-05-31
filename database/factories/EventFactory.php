<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;


class EventFactory extends Factory
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
            'venue' => (string)$this->faker->address,
            'start_date_time' => now(),
            'location_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14127.915048481324!2d85.3436734!3d27.717941999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1653840078208!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
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
