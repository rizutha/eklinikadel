<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdusenModel;
use App\Models\SatuanModel;
use App\Models\BatchModel;


class Obat extends Model
{
    use HasFactory;
    protected $table = 'obats';
    protected $primaryKey = 'id_obat';
    public function produsen() 
    {
        return $this->belongsTo(ProdusenModel::class, 'id_prod', 'id_prod');
    }
    
    public function satuan() 
    {
        return $this->belongsTo(SatuanModel::class, 'id_satuan', 'id_satuan');
    }
    
    public function batch() 
    {
        return $this->belongsTo(BatchModel::class, 'id_batch', 'id_batch');
    }    
}
