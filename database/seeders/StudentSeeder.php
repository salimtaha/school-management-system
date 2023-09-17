<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('students')->truncate();

        Student::create([
            'name' => ['en' => 'salim' ,  'ar' => 'سالم'],
            'email' => 'salim11@gmail.com',
            'password' => Hash::make('333333'),
            'gender_id' => 1,
            'nationalitie_id' => 1,
            'blood_id' => 1,
            'Date_Birth' => date('y-m-d'),
            'Grade_id' =>1,
            'Classroom_id' =>1,
            'section_id' => 1,
            'parent_id' => 1,
            'academic_year' => date('Y'),
        ]);
        Student::create([
            'name' => ['en' => 'hkaled' ,  'ar' => 'خالد'],
            'email' => 'khaled@gmail.com',
            'password' => Hash::make('333333'),
            'gender_id' => 1,
            'nationalitie_id' => 1,
            'blood_id' => 1,
            'Date_Birth' => date('y-m-d'),
            'Grade_id' =>1,
            'Classroom_id' =>1,
            'section_id' => 1,
            'parent_id' => 1,
            'academic_year' => date('Y'),
        ]);
        Student::create([
            'name' => ['en' => 'ali' ,  'ar' => 'علي'],
            'email' => 'ali55@gmail.com',
            'password' => Hash::make('333333'),
            'gender_id' => 1,
            'nationalitie_id' => 1,
            'blood_id' => 1,
            'Date_Birth' => date('y-m-d'),
            'Grade_id' =>1,
            'Classroom_id' =>1,
            'section_id' => 1,
            'parent_id' => 1,
            'academic_year' => date('Y'),
        ]);
    }
}
