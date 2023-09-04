<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedirectLogsTable extends Migration
{
    public function up()
    {
        Schema::create('redirect_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('UserID');
            $table->string('PageAccessed', 255);
            $table->timestamp('AccessTimestamp')->useCurrent();
            $table->foreign('UserID')->references('UserID')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('redirect_logs');
    }
}

