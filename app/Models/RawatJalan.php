<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftarans;
use App\Models\TindakanModel;
use App\Models\PoliModel;

class RawatJalan extends Model
{
    use HasFactory;
    protected $table = 'rawat_jalans';
    protected $primaryKey = 'id_rawat_jalan';

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftarans::class, 'no_reg', 'no_reg');
    }

    public function tindakan()
    {
        return $this->belongsTo(TindakanModel::class, 'id_tindakan', 'id_tindakan');
    }

    public function poli()
    {
        return $this->belongsTo(PoliModel::class, 'id_poli', 'id_poli');
    }
}
