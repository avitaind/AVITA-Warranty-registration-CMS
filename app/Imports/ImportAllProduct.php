<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\product_model;
use App\Models\product_number;
use App\Models\product_type;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

// class ImportAllProduct implements ToCollection, WithHeadingRow,WithValidation
class ImportAllProduct implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */

    public function headings():array{
        return[
            'Product Type','Product Series'
        ];
    }


    public function collection(Collection $rows)
    {
        dd($rows->all());
        foreach ($rows as $row) {

            product_type::create([
                'name' => $row['name'],
            ]);

            $product_types_id = $this->product_type->where('name', $row['name'])->first();

            Product::create([
                'name' => $row['name'],
                'product_types_id' => $product_types_id->id,
            ]);



            // $product_id = $this->ab->where('products_id', $row['products_id'])->first();

            // product_model::create([
            //     'model_number' => $row['model_number'],
            //     'products_id' => $row['products_id'],
            // ]);

            // product_number::create([
            //     'product_model_id' => $row['product_model_id'],
            //     'product_number' => $row['product_number'],
            //     'titleName' => $row['titleName'],
            // ]);
        }
    }

    // public function rules(): array
    //     {
    //         return[
    //             'nameType'              => 'required',
    //             'nameProduct'              => 'required',
    //             // 'model_number'      => 'required',
    //             // 'products_id'       => 'required',
    //             // 'product_model_id'  => 'required',
    //             // 'product_number'    => 'required',
    //             // 'titleName'         => 'required',
    //         ];
    //     }
}
