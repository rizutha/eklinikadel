<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakanModel extends Model
{
    use HasFactory;
    protected $table = 'tindakans';
    protected $primaryKey = 'id_tindakan';
}
