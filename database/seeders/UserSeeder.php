<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['email' => 'admin@gmail.com', 'pic' => '6888365fe8d41.png', 'name' => 'วงศ์นรินทร์', 'surname' => 'สุขวิชัย', 'born' => '1988-06-11', 'gender' => '1', 'type' => '1', 'degree' => '2', 'nation' => '1', 'ident' => '1', 'idcard' => '11', 'tel' => '080-3181929', 'password' => '$2y$12$8vpSVXbdrBnIQF9rsgLwFe3lTalHKjh.xOyBdoYj0Meao78iTqZt.', 'status' => '1', 'level' => 'admin'],
            ['email' => 'test@gmail.com', 'name' => 'นักเรียน', 'surname' => 'นักศึกษา', 'password' => '$2y$12$8vpSVXbdrBnIQF9rsgLwFe3lTalHKjh.xOyBdoYj0Meao78iTqZt.'],
        ];

        foreach ($data as $r) {
            User::create($r);
        }
    }
}
