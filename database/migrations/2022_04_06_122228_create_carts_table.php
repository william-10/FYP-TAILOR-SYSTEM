<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prod_id');
            $table->string('prod_qty');
            $table->unsignedBigInteger('kifua');
            $table->unsignedBigInteger('urefu_juu');
            $table->unsignedBigInteger('urefu_mguu');
            $table->unsignedBigInteger('bega');
            $table->unsignedBigInteger('kiuno');
            $table->unsignedBigInteger('paja');
            $table->unsignedBigInteger('mkono');
            $table->timestamps();


            $table->foreign('prod_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
