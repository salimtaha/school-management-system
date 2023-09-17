<?php

namespace Database\Seeders;

use App\Models\My_Parent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('my__parents')->truncate();
        My_Parent::create([
            'Email' => 'ali11@gmail.com' ,
            'Password' => Hash::make('00000000') ,
            'Name_Father' => ['ar'=>'علي السيد' , 'en'=>'Ali Elsayed'] ,
            'Job_Father' => ['ar'=>'مبرمج ' , 'en'=>'softwer engineer'] ,
            'National_ID_Father' => '1111111111' ,
            'Passport_ID_Father' => '1111111111',
            'Phone_Father' =>'3223232323',
            'Nationality_Father_id' => 1,
            'Blood_Type_Father_id' =>1,
            'Religion_Father_id' => 1,
            'Address_Father' =>'egypt',
            'Name_Mother' => ['ar'=>'salama ' , 'en'=>' salama'] ,
            'National_ID_Mother' => '1121111111',
            'Passport_ID_Mother' =>'1111111111',
            'Phone_Mother' => '11111111111',
            'Job_Mother' => ['ar'=>'hoome worker ' , 'en'=>' hoome worker'] ,
            'Nationality_Mother_id' => 1,
            'Blood_Type_Mother_id' => 1,
            'Religion_Mother_id' => 1,
            'Address_Mother' => 'egypt',

        ]);
        My_Parent::create([
            'Email' => 'hassan11@gmail.com' ,
            'Password' => Hash::make('00000000') ,
            'Name_Father' => ['ar'=>'حسن ' , 'en'=>' hassan'] ,
            'Job_Father' => ['ar'=>'مبرمج ' , 'en'=>'softwer engineer'] ,
            'National_ID_Father' => '1111111111' ,
            'Passport_ID_Father' => '1111111111',
            'Phone_Father' =>'3223232323',
            'Nationality_Father_id' => 1,
            'Blood_Type_Father_id' =>1,
            'Religion_Father_id' => 1,
            'Address_Father' =>'egypt',
            'Name_Mother' => ['ar'=>'salama ' , 'en'=>' salama'] ,
            'National_ID_Mother' => '1121111111',
            'Passport_ID_Mother' =>'1111111111',
            'Phone_Mother' => '11111111111',
            'Job_Mother' => ['ar'=>'hoome worker ' , 'en'=>' hoome worker'] ,
            'Nationality_Mother_id' => 1,
            'Blood_Type_Mother_id' => 1,
            'Religion_Mother_id' => 1,
            'Address_Mother' => 'egypt',

        ]);
            
    }
}
