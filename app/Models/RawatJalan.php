<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;
use App\Models\Tindakan;
use App\Models\Poli;

class RawatJalan extends Model
{
    use HasFactory;
    protected $table = 'rawat_jalans';
    protected $primaryKey = 'id_rawat_jalan';

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'no_reg', 'no_reg');
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class, 'id_tindakan', 'id_tindakan');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }
}
