<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kind;

class KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'จดหมายและอีเมลทางราชการ'],
            ['title' => 'เอกสารทางราชการและส่วนบุคคล'],
            ['title' => 'บทคัดย่อและเอกสารทางวิขาการ'],
        ];

        foreach ($data as $r) {
            Kind::create($r);
        }
    }
}
