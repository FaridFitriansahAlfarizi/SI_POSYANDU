<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'jenis_pekerjaan',
        'golongan_darah',
        'status_perkawinan',
        'tanggal_perkawinan',
        'status_hubungan_keluarga',
        'kewarganegaraan',
        'username',
        'password',
        'level',
    ];
}
