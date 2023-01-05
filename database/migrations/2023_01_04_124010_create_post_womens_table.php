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
        Schema::create('post_womens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('women_category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->string('sku');
            $table->text('description');
            $table->boolean('size_s')->nullable();
            $table->boolean('size_m')->nullable();
            $table->boolean('size_l')->nullable();
            $table->boolean('size_xl')->nullable();
            $table->boolean('size_xxl')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img4')->nullable();
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
        Schema::dropIfExists('post_womens');
    }
};
