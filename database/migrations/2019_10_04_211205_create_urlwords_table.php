<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlwordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urlwords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            //$table->string('slug')->nullable();
            $table->unsignedBigInteger('urlword_category_id');
           // $table->timestamps();

           // $table->foreign('urlword_category_id')->references('id')->on('urlword_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urlwords');
    }
}
