<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kegiatan::create([
            'gambar_kegiatan' => 'whatsapp-image-2022-06-28-at-10.30.55-pm.jpeg',
            'diskripsi_kegiatan' => 'Maksud dan tujuan dari kegiatan tersebut antara lain : a. Melatih keterampilan dosen untuk membuat parafrasa sehingga menghasilkan karya ilmiah bermutu yang bebas dari unsur-unsur plagiarisme. b. Menghasilkan karya ilmiah yang bermutu, baik nasional maupun internasional',
            'nama_kegiatan' => 'Seminar Strategi Pencegahan Plagiarisme dan Penggunaan Parafrase Dalam Penelitian',
            'tgl_kegiatan' => '2023-05-03',
            'jam_kegiatan' => '08:00',
            'id_ormawa' => '1',
            'tempat' => 'Gedung A Lantai 3 Ruang 3',
            'hari' => 'Senin',
            'id_jenis_kegiatan' => '1'

        ]);

        Kegiatan::create([
            'gambar_kegiatan' => 'seminar-nasional-daring-13-03-22.jpeg',
            'diskripsi_kegiatan' => 'Banyak kalangan menyebut anak-anak muda zaman now sebagai generasi millennial. Generasi ini lahir setelah zaman generasi  X, atau tepatnya  pada kisaran tahun 1980 sampai tahun 2000-an. Jadi dapat diperkirakan bahwa saat ini generasi millennial memiliki rentang usia 17 hingga 37 tahun. Di Indonesia sendiri, terdapat sekitar 80 juta orang yang berusia antara 17 hingga 37 tahun.',
            'nama_kegiatan' => 'MENJADI GENERASI MILLENNIAL YANG SELALU KREATIF, AKTIF, DAN INOVATIF',
            'tgl_kegiatan' => '2023-05-05',
            'jam_kegiatan' => '08:00',
            'id_ormawa' => '1',
            'tempat' => 'Gedung A Lantai 3 Ruang 3',
            'hari' => 'Rabu',
            'id_jenis_kegiatan' => '1'

        ]);
    }
}
