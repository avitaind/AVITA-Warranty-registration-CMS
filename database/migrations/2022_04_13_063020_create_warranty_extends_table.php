<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantyExtendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_extends', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_Series')->nullable();
            $table->string('product_model')->nullable();
            $table->string('product_number')->nullable();
            $table->text('product_configuration')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('reseller_name')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('purchase_code')->nullable();
            $table->string('purchase_invoice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warranty_extends');
    }
}
