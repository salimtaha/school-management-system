<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('specializations')->truncate();
        $specializations = [
            ['en'=>'arabic' , 'ar'=>'عربي'],
            ['en'=>'Science' , 'ar'=>'علوم'],
            ['en'=>'computer' , 'ar'=>'حاسب الي'],
            ['en'=>'English' , 'ar'=>'انجليزي'],
        ];
        foreach($specializations as $specialization){
            Specialization::create(['Name'=>$specialization]);
        }
        
    }
}
