<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'productNumber',
        'serialNumber',
        'productConfiguration',
        'color',
        'screenSize',
        'saleDate',
        'purchaseInvoice',
    ];
}
