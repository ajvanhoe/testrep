<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug');
            $table->longText('levels')->nullable();
            $table->unsignedBigInteger('landing_id')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable()->default(0);
            $table->unsignedBigInteger('keyword_category_id')->nullable()->default(0);
            
            $table->timestamps();  // ovo nikako ne izostaviti zbog sitemap-a
        });


        Schema::create('keyword_page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('keyword_id');
            $table->unsignedBigInteger('page_id');
            $table->unique(['keyword_id', 'page_id']);
            
            //$table->foreign('keyword_id')->references('id')->on('keywords');//->onDelete('cascade');
            //$table->foreign('page_id')->references('id')->on('pages');//->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keywords');
        Schema::dropIfExists('keyword_page');
    }
}
