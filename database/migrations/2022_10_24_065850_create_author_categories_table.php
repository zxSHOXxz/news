<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_categories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('author_id');
            $table->foreign('author_id')->on('authors')->references('id')->cascadeOnDelete();

            $table->foreignId('category_id');
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete();

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
        Schema::dropIfExists('author_categories');
    }
}
