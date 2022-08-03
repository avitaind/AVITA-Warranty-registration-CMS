<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_types')->insert([
            [
                "name"          => 'Notebook',
                "created_at"    => '2022-03-18 07:17:09',
                "updated_at"    => '2022-03-18 07:17:09',
            ],
            [
                "name"          => 'Smart Devices',
                "created_at"    => '2022-03-18 07:17:09',
                "updated_at"    => '2022-03-18 07:17:09',
            ],
            [
                "name"          => 'Accessories',
                "created_at"    => '2022-03-18 07:17:09',
                "updated_at"    => '2022-03-18 07:17:09',
            ],
            [
                "name"          => 'Convertible',
                "created_at"    => '2022-03-18 07:17:09',
                "updated_at"    => '2022-03-18 07:17:09',
            ],
        ]);
    }
}
