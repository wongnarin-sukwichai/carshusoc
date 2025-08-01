<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lang;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Thai'],
            ['title' => 'English'],
            ['title' => 'Japanese'],
            ['title' => 'Chinese'],
            ['title' => 'Korean'],
            ['title' => 'French'],
            ['title' => 'Lao'],
            ['title' => 'Khmer'],
        ];

        foreach ($data as $r) {
            Lang::create($r);
        }
    }
}
