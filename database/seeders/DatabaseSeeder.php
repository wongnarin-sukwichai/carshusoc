<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GenderSeeder::class,
            TypeSeeder::class,
            LangSeeder::class,
            KindSeeder::class,
            DegreeSeeder::class,
            EventSeeder::class,
            ExamSeeder::class,
            UserSeeder::class
        ]);
    }
}
