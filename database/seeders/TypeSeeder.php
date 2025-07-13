<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::factory()->create(
            ['title' => 'มัธยม'],
            ['title' => 'นิสิต/นักศึกษา'],
            ['title' => 'บุคลากร'],
            ['title' => 'บุคคลทั่วไป'],
        );
    }
}
