<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopownerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopowner', function (Blueprint $table) {
            $table->increments('shopowner_id');
            $table->String('shopowner_name')->nullable();
            $table->String('shopowner_email')->unique()->nullable();
            $table->String('shopowner_role',15)->nullable();
            $table->String('shopowner_username',50)->nullable();
            $table->String('shopowner_password',50)->nullable();
            $table->String('shopowner_language',20)->nullable();
            $table->String('shopowner_currency',4)->nullable();
            $table->boolean('shopowner_active')->default(1);
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
        Schema::dropIfExists('shopowner');
    }
}
