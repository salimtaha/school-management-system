<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        
        // DB::table('grades')->truncate();
        Grade::create([
            'name' => ['ar'=>'المرحله الابتدائيه' , 'en'=>'Primary School'],
            'notes'=>'لا يوجد ملاحظات',
        ]);
        Grade::create([
            'name' => ['ar'=>'المرحله الاعداديه' , 'en'=>'middle School '],
            'notes'=>'لا يوجد ملاحظات',
        ]);
        Grade::create([
            'name' => ['ar'=>'المرحله الثانويه' , 'en'=>'Secondry School'],
            'notes'=>'لا يوجد ملاحظات',
        ]);
    }
}
