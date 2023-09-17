<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('classrooms')->truncate();

        Classroom::create([
            'name_class'=>['ar'=>'الصف الاول' , 'en'=>'first class'],
            'grade_id'=>1,
        ]);
        Classroom::create([
            'name_class'=>['ar'=>'الصف الثاني' , 'en'=>'second class'],
            'grade_id'=>1,
        ]);
        Classroom::create([
            'name_class'=>['ar'=>'الصف الثالث' , 'en'=>'thirthd class'],
            'grade_id'=>1,
        ]);
        Classroom::create([
            'name_class'=>['ar'=>'الصف الرابع' , 'en'=>'fourth class'],
            'grade_id'=>1,
        ]);
        Classroom::create([
            'name_class'=>['ar'=>'الصف الخامس' , 'en'=>'fifth class'],
            'grade_id'=>1,
        ]);
        Classroom::create([
            'name_class'=>['ar'=>'الصف السادس' , 'en'=>'secondry class'],
            'grade_id'=>1,
        ]);

//   ============== المراحل الاهداديه================
        Classroom::create([
            'name_class'=>['ar'=>'الصف الاول' , 'en'=>'first class'],
            'grade_id'=>2,
        ]);
        Classroom::create([
            'name_class'=>['ar'=>'الصف الثاني' , 'en'=>'second class'],
            'grade_id'=>2,
        ]);
       Classroom::create([
           'name_class'=>['ar'=>'الصف الثالث' , 'en'=>'thirthd class'],
           'grade_id'=>2,
        ]);
       
        //   ============== المراحل الثانويه================
        Classroom::create([
            'name_class'=>['ar'=>'الصف الاول' , 'en'=>'first class'],
            'grade_id'=>3,
        ]);
        Classroom::create([
            'name_class'=>['ar'=>'الصف الثاني' , 'en'=>'second class'],
            'grade_id'=>3,
        ]);
       Classroom::create([
           'name_class'=>['ar'=>'الصف الثالث' , 'en'=>'thirthd class'],
           'grade_id'=>3,
        ]);
       
    }

}
