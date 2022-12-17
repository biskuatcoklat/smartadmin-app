<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employments')->insert([
            'nama'=>"Wahyu Aprilliandhika",
            'jenis_kelamin'=>"Laki-Laki",
            'no_hp'=>'082276052469'
        ]);

        DB::table('employments')->insert([
            'nama'=>"Sakti Adnan Magani",
            'jenis_kelamin'=>"Laki-Laki",
            'no_hp'=>'081334235555'
        ]);

        DB::table('employments')->insert([
            'nama'=>"Zaki Fadhil Alfarizil",
            'jenis_kelamin'=>"Laki-Laki",
            'no_hp'=>'0853i5485758'
        ]);

        DB::table('employments')->insert([
            'nama'=>"Ika Dewi",
            'jenis_kelamin'=>"Perempuan",
            'no_hp'=>'081234567891'
        ]);
    }
}
