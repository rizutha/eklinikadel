<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransaksiModel;
use App\Models\RawatJalan;
use App\Models\DetailObat;

class DetailTransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksis';
    protected $primaryKey = 'id_rincian_pembayaran';

    public function transaksi()
    {
        return $this->belongsTo(TransaksiModel::class, 'id_pembayaran', 'id_pembayaran');
    }

    public function rawatJalan()
    {
        return $this->belongsTo(RawatJalan::class, 'id_rawat_jalan', 'id_rawat_jalan');
    }

    public function DetailObat()
    {
        return $this->belongsTo(DetailObat::class, 'id_detail_obat', 'id_detail_obat');
    }
}
