<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;
use App\Models\KasirModel;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id_pembayaran';

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'no_reg', 'no_reg');
    }

    public function kasir()
    {
        return $this->belongsTo(KasirModel::class, 'id_kasir', 'id_kasir');
    }

}
