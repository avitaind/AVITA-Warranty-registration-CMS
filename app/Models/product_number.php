<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_number extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'name',
        'product_model_id',
        'product_number',
        'titleName',
        'serial_number',
    ];
}
