<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    public $table='review';
    public $primaryKey='review_id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
