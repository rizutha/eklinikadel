<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdusenModel extends Model
{
    use HasFactory;
    protected $table = 'produsens';
    protected $primaryKey = 'id_prod';
}
