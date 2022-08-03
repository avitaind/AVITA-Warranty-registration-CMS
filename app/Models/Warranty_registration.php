<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty_registration extends Model
{
    use HasFactory;

    protected $table = "warranty_registrations";

    protected $fillable = [
        'product_type',
        'product_Series',
        'product_model',
        'product_number',
        'product_configuration',
        'serial_number',
        'reseller_name',
        'purchase_date',
        'user_email',
        'user_name',
        'user_phone',
        'purchase_invoice'
    ];

}
