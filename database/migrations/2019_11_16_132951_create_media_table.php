<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');
            $table->string('url');
            $table->string('type'); // image / video - storovati ekstenziju
            $table->string('attribute')->nullable(); // sekcija
            $table->integer('article_id')->nullable();
            $table->integer('template_id')->nullable();
            $table->string('title')->nullable();
            $table->string('alt')->nullable();
            $table->string('caption')->nullable();
            $table->string('description')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
