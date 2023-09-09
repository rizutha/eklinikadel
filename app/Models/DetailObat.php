<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftarans;
use App\Models\Obat;
use App\Models\BungkusModel;
class DetailObat extends Model
{
    use HasFactory;
    protected $table = 'detail_obats';
    protected $primaryKey = 'id_detail_obat';
    public $timestamps = true;
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftarans::class, 'no_reg', 'no_reg');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }

    public function bungkus()
    {
        return $this->belongsTo(BungkusModel::class, 'id_bungkus', 'id_bungkus');
    }
}
