<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\gender;
class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders =[
            [ 'name'=> 'Male'],
            ['name'=> 'Female'],
            ['name'=> 'Others'],
        ];
        foreach ($genders as $gender) {
            Gender::create($gender);
        }
    }
}
