<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'product_types_id'
    ];

    public function productname($productid)
    {
        $pruducts = Product::where('id', $productid)->first();
        $productname = $products->name;
        return $productname;
    }
}
