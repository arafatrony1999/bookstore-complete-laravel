<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    public $table='orders';
    public $primaryKey='order_id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
