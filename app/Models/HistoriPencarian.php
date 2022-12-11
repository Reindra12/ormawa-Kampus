<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriPencarian extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'id_mahasiswa'];
    public $timestamps = false;
}
