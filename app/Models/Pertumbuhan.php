<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertumbuhan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'tanggal_posyandu',
        'berat_badan',
        'tinggi_badan',
        'umur',
    ];
}
