<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('isbn', 17)->unique();
            $table->string('title');
            $table->text('description');
            $table->string('genre');
            $table->string('cover_url')->nullable();
            $table->decimal('sale_price', 4, 2);
            $table->integer('author_id');
            $table->integer('publisher_id');
            $table->timestamps();
            $table
                ->foreign('author_id')
                ->references('id')
                ->on('authors');
            $table
                ->foreign('publisher_id')
                ->references('id')
                ->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
