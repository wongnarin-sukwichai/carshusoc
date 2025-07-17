<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Degree;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'ปริญญาตรี'],
            ['title' => 'ปริญญาโท'],
            ['title' => 'ปริญญาเอก'],
            ['title' => 'บุคคลทั่วไป'],
        ];

        foreach ($data as $r) {
            Degree::create($r);
        }
    }
}
