<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = "certificates";

    protected $fillable = [
        'product_configuration',
        'product_number',
        'serial_number',
        'reseller_name',
        'purchase_date',
        'email',
        'name',
        'phone',
        'extend_date',
        'order_id',
    ];
}
