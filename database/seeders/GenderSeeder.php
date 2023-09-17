<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // DB::table('genders')->truncate();
        $genders = [
            ['en'=>'Male' , 'ar'=>'ذكر'],
            ['en'=>'Female' , 'ar'=>'مرااا'],
        ];

        foreach($genders as $gender){
            Gender::create(['Name'=>$gender]);
        }
    }
}
