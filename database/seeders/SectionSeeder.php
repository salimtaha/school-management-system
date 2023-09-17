<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('sections')->truncate();

        $classesPrimary = Classroom::all();
        foreach($classesPrimary as $classPrimary)
        {
            Section::create([
                'name_section' =>['ar'=>'ا' , 'en'=>'A'],
                'status'=>1,
                'grade_id'=>$classPrimary->grade_id,
                'class_id'=>$classPrimary->id,
            ]);
            Section::create([
                'name_section' =>['ar'=>'ب' , 'en'=>'B'],
                'status'=>1,
                'grade_id'=>$classPrimary->grade_id,
                'class_id'=>$classPrimary->id,
            ]);
            Section::create([
                'name_section' =>['ar'=>'ج' , 'en'=>'C'],
                'status'=>1,
                'grade_id'=>$classPrimary->grade_id,
                'class_id'=>$classPrimary->id,
            ]);
            Section::create([
                'name_section' =>['ar'=>'د' , 'en'=>'D'],
                'status'=>1,
                'grade_id'=>$classPrimary->grade_id,
                'class_id'=>$classPrimary->id,
            ]);

        }
       
        
    }
}
