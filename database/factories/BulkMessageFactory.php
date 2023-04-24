<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BulkMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $emailArr = [];
        $phoneNumberArr = [];
        $num = 10; // generate a random number between 1 and 5
    
        for ($i = 0; $i < $num; $i++) {
            $emailArr[$i] = $this->faker->unique()->safeEmail;
        }
        for ($i = 0; $i < $num; $i++) {
            $phoneNumberArr[$i] = $this->faker->unique()->phoneNumber();
        }
        
        return [
            'title' => (string)$this->faker->sentence($nbWords = 1, $variableNbWords = true, true),
            'content' => (string)$this->faker->paragraphs(5, true),
            'created_by' => 1,
            // 'email' => $emailArr,
            // 'phone_number' => $phoneNumberArr,
            'medium' => [1, 2],
            'members' => [1,2,3,4,5]

        ];
    }
}
