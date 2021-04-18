<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = []; 
        $faker = Faker::create(); 
        $aGrades = [[1],[1,3],[1,2],[1,3,2],[2,3],[3,2,1]];
        foreach (range(1,20000) as $index) { 
            $data[] = [ 
                'name' => $faker->name, 
                'email' => $faker->email, 
                'password' => bcrypt('secret'),
                'grades' => implode(",",$aGrades[rand(0,5)]), 
                'created_at' => now()->toDateTimeString(), 
                'updated_at' => now()->toDateTimeString(), 
            ]; 
        }
        $chunks = array_chunk($data, 1000); 
        foreach($chunks as $chunk){ 
            DB::table('users')->insert($chunk); 
        }
    }
}
