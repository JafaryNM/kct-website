<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('productModel');
            $table->string('productDoors');
            $table->string('productChases');
            $table->string('productMiles');
            $table->integer('selingPrice');
            $table->string('productFrontImage');
            $table->string('seat')->nullable();
            $table->string('engineNo')->nullable();
            $table->bigInteger('fuelId');
            $table->bigInteger('productTypeId');
            $table->bigInteger('categoryId');
            $table->bigInteger('yearId');
            $table->bigInteger('transmitionId');
            $table->bigInteger('steeringId');
            $table->bigInteger('colorId');
            $table->bigInteger('conditionId');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
    }
}
