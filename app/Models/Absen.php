<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['status','id_mahasiswa', 'id_kegiatan','id_prodi'];
}
