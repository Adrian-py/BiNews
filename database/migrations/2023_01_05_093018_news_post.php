<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("news_posts", function(Blueprint $table){
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->string("content");
            $table->foreignId("users_id");
            $table->foreignId("news_tags_id");
            $table->string("image");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
