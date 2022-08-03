<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_models')->insert([
            [
                "name"              => null,
                "model_number"      => "NS14L001",
                "products_id"       => "1",
                "created_at"        => "2022-04-18 10:03:30",
                "updated_at"        => "2022-04-18 10:03:30"
            ],
            [
                "name"              => null,
                "model_number"      => "NS14L002",
                "products_id"       => "1",
                "created_at"        => "2022-04-18 10:03:35",
                "updated_at"        => "2022-04-18 10:03:35"
            ],
            [
                "name"              => null,
                "model_number"      => "NS14P001",
                "products_id"       => "2",
                "created_at"        => "2022-04-18 10:04:00",
                "updated_at"        => "2022-04-18 10:04:00"
            ],
            [
                "name"              => null,
                "model_number"      => "NS14P002",
                "products_id"       => "2",
                "created_at"        => "2022-04-18 10:04:08",
                "updated_at"        => "2022-04-18 10:04:08"
            ],
            [
                "name"              => null,
                "model_number"      => "COSMOS001",
                "products_id"       => "3",
                "created_at"        => "2022-04-18 10:04:25",
                "updated_at"        => "2022-04-18 10:04:25"
            ],
            [
                "name"              => null,
                "model_number"      => "COSMOS002",
                "products_id"       => "3",
                "created_at"        => "2022-04-18 10:04:33",
                "updated_at"        => "2022-04-18 10:04:33"
            ],
            [
                "name"              => null,
                "model_number"      => "NS14E001",
                "products_id"       => "4",
                "created_at"        => "2022-04-18 10:04:46",
                "updated_at"        => "2022-04-18 10:04:46"
            ],
            [
                "name"              => null,
                "model_number"      => "NS14E002",
                "products_id"       => "4",
                "created_at"        => "2022-04-18 10:04:52",
                "updated_at"        => "2022-04-18 10:04:52"
            ],
            [
                "name"              => null,
                "model_number"      => "IMAGO001",
                "products_id"       => "7",
                "created_at"        => "2022-04-18 10:05:32",
                "updated_at"        => "2022-04-18 10:05:32"
            ],
            [
                "name"              => null,
                "model_number"      => "IMAGO002",
                "products_id"       => "7",
                "created_at"        => "2022-04-18 10:05:39",
                "updated_at"        => "2022-04-18 10:05:39"
            ],
            [
                "name"              => null,
                "model_number"      => "MODUS001",
                "products_id"       => "8",
                "created_at"        => "2022-04-18 10:05:52",
                "updated_at"        => "2022-04-18 10:05:52"
            ],
            [
                "name"              => null,
                "model_number"      => "MODUS002",
                "products_id"       => "8",
                "created_at"        => "2022-04-18 10:05:58",
                "updated_at"        => "2022-04-18 10:05:58"
            ],
            [
                "name"              => null,
                "model_number"      => "SLEEVE001",
                "products_id"       => "5",
                "created_at"        => "2022-04-18 10:06:38",
                "updated_at"        => "2022-04-18 10:06:38"
            ],
            [
                "name"              => null,
                "model_number"      => "SLEEVE002",
                "products_id"       => "5",
                "created_at"        => "2022-04-18 10:06:44",
                "updated_at"        => "2022-04-18 10:06:44"
            ],
            [
                "name"              => null,
                "model_number"      => "MOUSE001",
                "products_id"       => "6",
                "created_at"        => "2022-04-18 10:06:57",
                "updated_at"        => "2022-04-18 10:06:57"
            ],
            [
                "name"              => null,
                "model_number"      => "MOUSE002",
                "products_id"       => "6",
                "created_at"        => "2022-04-18 10:07:02",
                "updated_at"        => "2022-04-18 10:07:02"
            ],
            [
                "name"              => null,
                "model_number"      => "DOMBULB001",
                "products_id"       => "9",
                "created_at"        => "2022-04-18 10:07:28",
                "updated_at"        => "2022-04-18 10:07:28"
            ],
            [
                "name"              => null,
                "model_number"      => "DOMBULB002",
                "products_id"       => "9",
                "created_at"        => "2022-04-18 10:07:36",
                "updated_at"        => "2022-04-18 10:07:36"
            ],
            [
                "name"              => null,
                "model_number"      => "DOMLED001",
                "products_id"       => "10",
                "created_at"        => "2022-04-18 10:07:52",
                "updated_at"        => "2022-04-18 10:07:52"
            ],
            [
                "name"              => null,
                "model_number"      => "DOMLED002",
                "products_id"       => "10",
                "created_at"        => "2022-04-18 10:08:00",
                "updated_at"        => "2022-04-18 10:08:00"
            ],
            [
                "name"              => null,
                "model_number"      => "NU14A1",
                "products_id"       => "12",
                "created_at"        => "2022-04-18 10:08:00",
                "updated_at"        => "2022-04-18 10:08:00"
            ],
        ]);
    }
}
