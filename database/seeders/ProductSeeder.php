<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                "name"                   => "LIBER",
                "product_types_id"       => "1",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:21:43",
                "updated_at"             => "2022-04-18 08:21:43"
            ],
            [
                "name"                   => "PURA",
                "product_types_id"       => "1",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:21:49",
                "updated_at"             => "2022-04-18 08:21:49"
            ],
            [
                "name"                   => "COSMOS 2-in-1",
                "product_types_id"       => "1",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:22:22",
                "updated_at"             => "2022-04-18 08:22:22"
            ],
            [
                "name"                   => "ESSENTIAL",
                "product_types_id"       => "1",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:23:02",
                "updated_at"             => "2022-04-18 08:23:02"
            ],
            [
                "name"                   => "SLEEVE",
                "product_types_id"       => "3",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:23:38",
                "updated_at"             => "2022-04-18 08:23:38"
            ],
            [
                "name"                   => "MOUSE",
                "product_types_id"       => "3",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:23:51",
                "updated_at"             => "2022-04-18 08:23:51"
            ],
            [
                "name"                   => "IMAGO",
                "product_types_id"       => "2",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:25:01",
                "updated_at"             => "2022-04-18 08:25:01"
            ],
            [
                "name"                   => "MODUS",
                "product_types_id"       => "2",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:25:29",
                "updated_at"             => "2022-04-18 08:25:29"
            ],
            [
                "name"                   => "DOMUS BULB",
                "product_types_id"       => "4",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:26:05",
                "updated_at"             => "2022-04-18 08:26:05"
            ],
            [
                "name"                   => "DOMUS LED",
                "product_types_id"       => "4",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:26:12",
                "updated_at"             => "2022-04-18 08:26:12"
            ],
            [
                "name"                   => "DOMUS LED",
                "product_types_id"       => "4",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:26:12",
                "updated_at"             => "2022-04-18 08:26:12"
            ],
            [
                "name"                   => "SATUS ULTIMUS",
                "product_types_id"       => "1",
                "extra_warranty"         => "0",
                "created_at"             => "2022-04-18 08:21:43",
                "updated_at"             => "2022-04-18 08:21:43"
            ],

        ]);
    }
}
