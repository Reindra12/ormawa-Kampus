<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_jenis_kegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['id_jenis_kegiatan', 'status','point'];
    public $timestamps = false;
}
