<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'nim'=> '123',
            'nama' => 'reindrairawan',
            'user' => 'reindra@gmail.com',
            'password' =>bcrypt('11111111'),

        ]);

        Mahasiswa::create([
            'nim'=> '1234',
            'nama' => 'lutfi',
            'user' => 'lutfi@gmail.com',
            'password' =>bcrypt('11111111'),
        ]);

    }
}
