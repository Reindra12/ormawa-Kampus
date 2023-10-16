<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = ['nama_pelanggan', 'alamat_pelanggan', 'nomor_meteran', 'telp', 'qrcode'];
    public $table = "pelanggans";
}
