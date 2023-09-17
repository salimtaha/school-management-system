<?php

namespace Database\Seeders;

use App\Models\Bloodtype;
use Faker\Core\Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BloodtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('bloodtypes')->truncate();

        // Bloodtype::create(['name' =>'A-']);
        // Bloodtype::create(['name' =>'A+']);
        // Bloodtype::create(['name' =>'B-']);
        // Bloodtype::create(['name' =>'B+']);
        // Bloodtype::create(['name' =>'O-']);
        // Bloodtype::create(['name' =>'O+']);
        // Bloodtype::create(['name' =>'AB+']);
        // Bloodtype::create(['name' =>'AB-']);
        
        // again code esier than that
        $bloods = ['A+' , 'A-' , 'B+' , 'B-' , 'O+' , 'O-' , 'AB+' , 'AB-'];
        foreach($bloods as $blood)
        {
            Bloodtype::create(['name' => $blood]);
        }
    }
}
