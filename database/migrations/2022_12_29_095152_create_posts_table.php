<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('men_category_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('sku');
            $table->string('img_folder')->unique();
            $table->integer('price');
            $table->boolean('size_s')->nullable();
            $table->boolean('size_m')->nullable();
            $table->boolean('size_l')->nullable();
            $table->boolean('size_xl')->nullable();
            $table->boolean('size_xxl')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
