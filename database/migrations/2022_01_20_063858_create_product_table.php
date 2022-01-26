<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
             $table->increments('product_id');
            $table->String('product_name')->nullable();
            $table->String('product_category')->unique()->nullable();
            $table->String('product_subcategory')->nullable();
            $table->integer('product_price')->nullable();
            $table->text('product_description')->nullable();
            $table->String('product_image')->nullable();
            $table->boolean('product_status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
