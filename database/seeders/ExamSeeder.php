<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exam;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Exam::factory()->create(
            ['title' => 'TOEIC'],
            ['title' => 'CEFR'],
            ['title' => 'EPT'],
        );
    }
}
