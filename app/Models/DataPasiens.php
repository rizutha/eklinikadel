<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPasiens extends Model
{
    use HasFactory;
    protected $table = 'data_pasiens';

    protected $fillable = [
        'id',
        'no_rm',
        'Nama_lengkap',
        'nik',
        'tgl_lahir',
        'umur',
        'alamat',
        'kecamatan',
        'kabupaten',
        'tanggal_terakhir_periksa',
        'status',
    ];

}
