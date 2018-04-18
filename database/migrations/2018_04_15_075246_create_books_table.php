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
            $table->string('book_name')->nullable();
            $table->string('author')->nullable();
            $table->integer('number_pages')->nullable();
            $table->date('release_date')->nullable();
            $table->string('category_name')->nullable();
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
