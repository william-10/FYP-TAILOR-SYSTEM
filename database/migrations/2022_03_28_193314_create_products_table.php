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
            $table->unsignedBigInteger('tailor_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('gender_id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('qty');
            $table->tinyInteger('upper_part');
            $table->tinyInteger('lower_part');

            $table->tinyInteger('status');
            $table->tinyInteger('trending');

            $table->timestamps();

            $table->foreign('tailor_id')
            ->references('tailor_id')
            ->on('tailors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('category_id')
            ->references('category_id')
            ->on('cloth_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('gender_id')
            ->references('id')
            ->on('genders')
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
        Schema::dropIfExists('products');
    }
}
