<?php

namespace Database\Seeders;

use App\Models\Tagihan;
use Illuminate\Database\Seeder;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tagihan::create([
            'id_pelanggan' => '1',
            'tgl_tagihan' => '12-12-2022',
            'jumlah_tagihan' => '120000',
            'status_tagihan' => 'bayar',
        ]);
        Tagihan::create([
            'id_pelanggan' => '2',
            'tgl_tagihan' => '2-2-2022',
            'jumlah_tagihan' => '220000',
            'status_tagihan' => 'belum',
        ]);
    }
}
