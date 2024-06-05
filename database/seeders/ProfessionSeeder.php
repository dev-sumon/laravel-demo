<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professions = [
            ['name'=>'Teacher'],
            ['name'=>'Doctor'],
            ['name'=>'Engineer'],
            ['name'=>'Software Engineer'],
            ['name'=>'Web Developer'],
            ['name'=>'Software Developer'],
        ];
        foreach ($professions as $profession) {
            Profession::create($profession);

        }
    }
}
