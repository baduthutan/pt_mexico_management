<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('ProductID');
            $table->enum('Category', ['Sedan', 'SUV', 'Sports car']);;
            $table->string('ProductName', 80);
            $table->integer('Price');
            $table->integer('Quantity');
            $table->binary('Photo')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

