<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagesProducts extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('images', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->default(0);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('slug')->default('');
            $table->string('location')->default('');
            $table->boolean('offer')->default(false);
            $table->boolean('carrusel')->default(false);
            $table->boolean('gallery')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('images');
    }

}
