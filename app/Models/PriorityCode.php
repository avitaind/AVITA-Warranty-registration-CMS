<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriorityCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
    ];
}
