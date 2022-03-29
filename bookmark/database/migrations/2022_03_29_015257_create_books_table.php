<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();#AUTO INCREMENTING PRIMARY KEY
            $table->timestamps();# 'CREATED_AT', 'UPDATED_AT'
            $table->string('slug'); #VARCHAR
            $table->string('title'); #VARCHAR
            $table->tinyInteger('published_year'); #VARCHAR
            $table->string('author'); #VARCHAR
            $table->string('cover_url')->nullable(); #VARCHAR
            $table->string('infor_url'); #VARCHAR
            $table->string('purchase_url'); #VARCHAR
            $table->text('description'); #VARCHAR
        });
    }

    //slug VARCHAR
    //title VARCHAR
    //author VARCHAR
    //published_year SMALLINT
    //cover_url VARCHAR
    //info_url VARCHAR
    //purchase_url VARCHAR
    //description TEXT
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};