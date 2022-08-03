<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use App\Models\Warranty_extend;

class ExportWarrantyExtend implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'Customer Name',
            'Email',
            'Phone',
            'Product Type',
            'Product Series',
            'Product Model',
            'Product Number',
            'Product Configuration',
            'Serial Number',
            'Purchase Code',
            'Reseller Name',
            'Product Purchase Date',
        ];
    }

    public function collection()
    {

        return DB::table('warranty_extends')->join('product_types', 'product_types.id', '=', 'warranty_extends.product_type')
        ->join('products', 'products.id', '=', 'warranty_extends.product_Series')
        ->join('product_models', 'product_models.id', '=', 'warranty_extends.product_model')
        ->join('product_numbers', 'product_numbers.id', '=', 'warranty_extends.product_number')
        ->select(
            'user_name',
            'user_email',
            'user_phone',
            'product_types.name as product_type',
            'products.name as product_Series',
            'product_models.model_number as product_model',
            'product_numbers.product_number as product_number',
            'product_configuration',
            'serial_number',
            'purchase_code',
            'reseller_name',
            'purchase_date',
        )->get();

        // return Warranty_extend::all();
    }
}
