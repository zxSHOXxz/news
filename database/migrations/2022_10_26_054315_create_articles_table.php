<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable;
            $table->string('short_description');
            $table->string('full_description');
            $table->foreignId('author_id');
            $table->foreign('author_id')->on('authors')->references('id')->nullOnDelete();
            $table->foreignId('category_id');
            $table->foreign('category_id')->on('categories')->references('id')->nullOnDelete();
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
        Schema::dropIfExists('articles');
    }
}
