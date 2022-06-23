<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tailor_id');
            $table->unsignedBigInteger('cloth_category_id');
            $table->timestamps();

            $table->foreign('tailor_id')
            ->references('tailor_id')
            ->on('tailors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('cloth_category_id')
            ->references('category_id')
            ->on('cloth_categories')
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
        Schema::dropIfExists('categories');
    }
}
