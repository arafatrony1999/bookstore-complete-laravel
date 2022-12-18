<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review_reaction extends Model
{
    public $table='review_reaction';
    public $primaryKey='review_id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
