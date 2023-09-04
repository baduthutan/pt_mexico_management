<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id('InvoiceItemID');
            $table->unsignedBigInteger('InvoiceID');
            $table->unsignedBigInteger('ProductID');
            $table->string('ProductName', 80);
            $table->integer('Quantity');
            $table->integer('Subtotal');
            $table->foreign('InvoiceID')->references('InvoiceID')->on('invoices');
            $table->foreign('ProductID')->references('ProductID')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
}

