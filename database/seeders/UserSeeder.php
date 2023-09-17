<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->truncate();
        // User::factory()->count(100)->create();
        User::create([
            'name'=>'admin',
            'email'=>'salimalkassas1122@gmail.com',
            'password'=>Hash::make('00000000'),
        ]);
    }
}
