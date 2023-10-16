<?php

namespace Database\Seeders;

use App\Models\Ormawa;
use Illuminate\Database\Seeder;

class OrmawaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ormawa::create([
            'nama_ormawa' => 'BEM Fakultas Teknik',
            'status' => 'y',
            'user' => 'bemft@gmail.com',
            'password' => bcrypt('11111111'),
        ]);

        Ormawa::create([
            'nama_ormawa' => 'BEM Fakultas Agama Islam',
            'status' => 'y',
            'user' => 'bemfai@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
    }
}
