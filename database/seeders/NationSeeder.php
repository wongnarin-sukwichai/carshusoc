<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nation;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'ไทย'],
            ['title' => 'ลาว'],
            ['title' => 'พม่า'],
            ['title' => 'กัมพูชา'],
            ['title' => 'เวียดนาม'],
            ['title' => 'จีน'],
            ['title' => 'ญี่ปุ่น'],
            ['title' => 'เกาหลีใต้'],
            ['title' => 'มาเลเซีย'],
            ['title' => 'สิงคโปร์'],
            ['title' => 'อินโดนีเซีย'],
            ['title' => 'ฟิลิปปินส์'],
            ['title' => 'อินเดีย'],
            ['title' => 'บังกลาเทศ'],
            ['title' => 'เนปาล'],
            ['title' => 'ปากีสถาน'],
            ['title' => 'ศรีลังกา'],
            ['title' => 'ฝรั่งเศส'],
            ['title' => 'อังกฤษ'],
            ['title' => 'เยอรมัน'],
            ['title' => 'อิตาลี'],
            ['title' => 'สเปน'],
            ['title' => 'โปรตุเกส'],
            ['title' => 'สหรัฐอเมริกา'],
            ['title' => 'แคนาดา'],
            ['title' => 'ออสเตรเลีย'],
            ['title' => 'นิวซีแลนด์'],
            ['title' => 'บราซิล'],
            ['title' => 'เม็กซิโก'],
            ['title' => 'รัสเซีย'],
            ['title' => 'ยูเครน'],
            ['title' => 'แอฟริกาใต้'],
            ['title' => 'อียิปต์'],
            ['title' => 'ซาอุดีอาระเบีย'],
            ['title' => 'ตุรกี'],
            ['title' => 'อิสราเอล']
        ];

        foreach ($data as $r) {
            Nation::create($r);
        }
    }
}
