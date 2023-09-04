<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('FullName', 40);
            $table->string('Email', 255);
            $table->string('Password', 12);
            $table->string('PhoneNumber', 15);
            $table->enum('UserRole', ['Admin', 'User']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

