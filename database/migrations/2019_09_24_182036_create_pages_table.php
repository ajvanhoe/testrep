<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['home', 'page', 'landing'])->nullable(); // home/page/landing
            $table->unsignedBigInteger('index')->default(1); // nije nullable
            $table->longText('urlwords')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('template_id')->nullable();  // general template (for landings)
            // $table->integer('landing_id')->nullable();  // landing page for keywords - ode u keywords
            $table->unsignedBigInteger('parrent_id')->nullable();  // parrent page id
            $table->unsignedBigInteger('metatag_id')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
