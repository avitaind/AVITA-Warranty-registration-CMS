<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'user_id',
        'serial_num',
        'purchase_from',
        'purchase_date',
    ];
}
