<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestockHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('restock_history', function (Blueprint $table) {
            $table->id('RestockID');
            $table->unsignedBigInteger('ProductID');
            $table->timestamp('RestockDate')->useCurrent();
            $table->foreign('ProductID')->references('ProductID')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('restock_history');
    }
}

