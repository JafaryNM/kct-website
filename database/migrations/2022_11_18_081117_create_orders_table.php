<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phoneNumber');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('gender');
            $table->text('inquiry')->nullable();
            $table->string('productImage');
            $table->string('productName');
            $table->string('category');
            $table->string('orderType');
            $table->string('status');
            $table->string('year');
            $table->string('paySlip')->nullable();
            $table->integer('customerId');
            $table->integer('sellingPrice');
            $table->integer('firstInstallment')->default(0);
            $table->integer('secondInstallment')->default(0);
            $table->integer('engineNo');
            $table->integer('milles');
            $table->string('color');
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
        Schema::dropIfExists('orders');
    }
}
