<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = ['nama_kegiatan', 'id_jenis_kegiatan', 'id_ormawa', 'diskripsi_kegiatan', 'gambar_kegiatan','tgl_kegiatan','jam_kegiatan','tempat','qrcode'];
    public $table = "kegiatans";
}
