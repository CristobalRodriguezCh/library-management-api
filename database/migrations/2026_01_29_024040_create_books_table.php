<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('published_date')->nullable();
            $table->string('isbn')->unique()->nullable();
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
