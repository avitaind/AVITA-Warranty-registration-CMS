<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyCode extends Model
{
    use HasFactory;

    protected $table = "warranty_codes";

    protected $fillable = [
        'code',
        'other',
    ];
}
