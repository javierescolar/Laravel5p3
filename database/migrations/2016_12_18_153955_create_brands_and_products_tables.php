<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsAndProductsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->default('');
			$table->string('slug')->default('');
			$table->string('logo');
			$table->timestamps();
		});
 
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('brand_id')->unsigned()->default(0);
			$table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
			$table->string('name')->default('');
			$table->string('slug')->default('');
			$table->text('description');
			$table->float('price');
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
        
        Schema::dropIfExists('products');
        Schema::dropIfExists('brands');
    }
}
