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
                        $table->string('slogan')->default('');
			$table->text('description');
                        $table->string('characteristic_1')->default('');
                        $table->string('characteristic_2')->default('');
                        $table->string('characteristic_3')->default('');
			$table->float('price');
                        $table->boolean('appears_on_offer')->default(false);
                        $table->integer('discount')->default(0);
                        $table->integer('stock')->default(0);
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
