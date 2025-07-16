<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Course'],
            ['title' => 'Service'],
            ['title' => 'Support'],
        ];

        foreach ($data as $r) {
            Event::create($r);
        }
    }
}
