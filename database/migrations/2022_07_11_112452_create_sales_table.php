<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('type')->nullable()->default('IN');
            $table->string('productNumber')->nullable();
            $table->string('serialNumber')->nullable();
            $table->string('productConfiguration')->nullable();
            $table->string('color')->nullable();
            $table->string('screenSize')->nullable();
            $table->string('saleDate')->nullable();
            $table->string('purchaseInvoice')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
