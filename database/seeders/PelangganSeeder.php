<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelanggan::create([
            'nama_pelanggan' => 'Samsul Arifin',
            'alamat_pelanggan' => 'paiton',
            'nomor_meteran' => '1234452',
            'telp' => '0821231123',
            'qrcode' => 'samsul.svg'
        ]);

        Pelanggan::create([
            'nama_pelanggan' => 'Saifuddin',
            'alamat_pelanggan' => 'kraksaan',
            'nomor_meteran' => '12222333',
            'telp' => '0821231123',
            'qrcode' => 'saif.svg'
        ]);
    }
}
