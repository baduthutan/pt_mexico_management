<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('InvoiceID');
            $table->unsignedBigInteger('UserID');
            $table->string('InvoiceNumber', 255);
            $table->string('ShippingAddress', 100);
            $table->string('PostalCode', 5);
            $table->integer('Subtotal');
            $table->integer('Total');
            $table->timestamp('InvoiceDate')->useCurrent();
            $table->foreign('UserID')->references('UserID')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}

