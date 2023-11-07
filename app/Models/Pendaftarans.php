<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPasiens;
class Pendaftarans extends Model
{
    use HasFactory;
    protected $fillable = ['no_rm'];
    protected $table = 'pendaftarans';
    protected $primaryKey = 'no_reg';
    public function dataPasien()
    {
        return $this->belongsTo(DataPasiens::class, 'no_rm', 'no_rm');
    }

}
