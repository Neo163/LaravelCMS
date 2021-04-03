<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBPostsParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_posts_paragraphs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->default('');
            $table->text('content')->nullable();
            $table->string('category', 20)->default('');
            $table->integer('sort')->nullable()->default(0);
            $table->integer('b_post_id')->nullable()->default(0);
            $table->integer('language_id')->nullable()->default(1);
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
        Schema::dropIfExists('b_posts_paragraphs');
    }
}
