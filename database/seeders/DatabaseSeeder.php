<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\ParentSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\BloodtypeSeeder;
use Database\Seeders\ClassroomSeeder;
use Database\Seeders\SpecializationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            BloodtypeSeeder::class,
            ReligionSeeder::class,
            NationalitieSeeder::class,
            SpecializationSeeder::class,
            GenderSeeder::class,
            GradeSeeder::class,
            ClassroomSeeder::class,
            SectionSeeder::class,
            ParentSeeder::class,
            StudentSeeder::class,
        ]);

    }
}
