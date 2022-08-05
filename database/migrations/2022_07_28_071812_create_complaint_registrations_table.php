<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('ticketID')->unique();
            $table->string('ticketOld')->nullable();
            $table->string('status')->default('In Processing');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('productSerialNo');
            $table->string('productPartNo');
            $table->string('purchaseDate');
            $table->string('warrantyCheck');
            $table->string('chanalPurchase');
            $table->string('city');
            $table->string('state');
            $table->string('pinCode');
            $table->text('address');
            $table->text('issue');
            $table->string('purchaseInvoice');
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
        Schema::dropIfExists('complaint_registrations');
    }
}
