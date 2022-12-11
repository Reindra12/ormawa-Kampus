<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable  implements JWTSubject
{
    use HasFactory, Notifiable;
    protected $table = 'mahasiswas';
    // protected $fillable = ['nama_ormawa', 'status','user','password'];
    public $timestamps = false;

    protected $guarded = [];
    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'id_mahasiswa','nama', 'user', 'password','nim','id_kabupaten','jenkel','id_kecamatan', 'tgl_lahir','alamat','id_desa', 'telp','id_prodi',
        'tahun_masuk','ospek','tahun_ospek','status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
