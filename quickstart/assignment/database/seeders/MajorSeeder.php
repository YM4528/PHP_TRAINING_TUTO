<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Major::create([
            'name' => 'Computer Science'
        ]);
        Major::create([
            'name' => 'Business'
        ]);
        Major::create([
            'name' => 'Web Development'
        ]);
        Major::create([
            'name' => 'Android'
        ]);
        Major::create([
            'name' => 'Data Structure'
        ]);
    }
}
