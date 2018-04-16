<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Fluent;
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
            $table->increments('id')->unique();
            $table->bigInteger('ISBN')->unique();
            $table->string('book_name');
            $table->string('author');
            $table->integer('number_pages');
            $table->date('release_date');
            $table->unsignedInteger('category_id');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('books');
    }
}
