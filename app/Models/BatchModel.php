<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchModel extends Model
{
    use HasFactory;
    protected $table = 'batch_obats';
    protected $primaryKey = 'id_batch';
}
