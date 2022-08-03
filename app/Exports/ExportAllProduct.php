<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportAllProduct implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings():array{
        return[
            'Product Type','Product Series', 'Product Model','Product Number','Product Configuration', 'Serial Number'
        ];
    }


    public function collection()
    {
        return DB::table('products')->join('product_types', 'product_types.id', '=', 'products.product_types_id')
            ->join('product_models', 'product_models.products_id', '=', 'products.id')
            ->join('product_numbers', 'product_numbers.product_model_id', '=', 'product_models.id')
            ->select('product_types.name as type_name', 'products.name', 'product_models.model_number', 'product_numbers.product_number', 'product_numbers.titleName', 'product_numbers.serial_number')->get();
    }
}
