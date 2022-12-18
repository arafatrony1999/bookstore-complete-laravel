<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_modal extends Model
{
    public $table='cart_table';
    public $primaryKey='ID';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
