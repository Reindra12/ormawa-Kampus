<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriPencarian extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    use HasFactory;
    protected $fillable = ['judul', 'id_mahasiswa', 'waktu'];
    public $timestamps = false;
}
