<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Email'=>fake()->Email(),
            'Password'=>fake()->password(),
            'Name'=>fake()->name(),
            'Specialization_id'=>fake()->randomKey([1,4]),
            'Gender_id'=>fake()->randomKey([1,2]),
            'Joining_Date'=>fake()->dateTime(),
            'Address'=>fake()->address(),
        ];
    }
}
