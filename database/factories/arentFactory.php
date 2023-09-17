<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\My_Parent>
 */
class arentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model  = 'My_Parent';

    public function definition(): array
    {
        return [
            'Email'=>fake()->unique()->safeEmail(),
        'Password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
        'Name_Father'=>fake()->firstNameMale(),
        'Phone_Father'=>fake()->phoneNumber(),
        'Job_Father'=>fake()->jobTitle(),
        'National_ID_Father'=>random_int(1000000000,9000000000),
        'Passport_ID_Father'=>random_int(1000000000,9000000000),
        'Nationality_Father_id'=>fake()->randomElement([1,10]),
        'Blood_Type_Father_id'=>fake()->randomElement([1,10]),
        'Religion_Father_id'=>fake()->randomElement([1,10]),
        'Address_Father'=>fake()->address(),

        'Name_Mother'=>fake()->firstNameMale(),
        'Phone_Mother'=>fake()->phoneNumber(),
        'Job_Mother'=>fake()->jobTitle(),
        'National_ID_Mother'=>random_int(1000000000,9000000000),
        'Passport_ID_Mother'=>random_int(1000000000,9000000000),
        'Nationality_Mother_id'=>fake()->randomElement([1,10]),
        'Blood_Type_Mother_id'=>fake()->randomElement([1,10]),
        'Religion_Mother_id'=>fake()->randomElement([1,10]),
        'Address_Mother'=>fake()->address(),


            //
        ];
    }
}
