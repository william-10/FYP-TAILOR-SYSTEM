<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('prod_id');
            $table->string('qty');
            $table->unsignedBigInteger('tailor_id');
            $table->string('price');
            $table->unsignedBigInteger('kifua');
            $table->unsignedBigInteger('urefu_juu');
            $table->unsignedBigInteger('urefu_mguu');
            $table->unsignedBigInteger('bega');
            $table->unsignedBigInteger('kiuno');
            $table->unsignedBigInteger('paja');
            $table->unsignedBigInteger('mkono');

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
        Schema::dropIfExists('order_items');
    }
}
