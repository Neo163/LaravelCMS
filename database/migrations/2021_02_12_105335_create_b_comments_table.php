<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_comments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->default('');
            $table->text('content')->nullable();
            $table->integer('b_comments_category_id')->nullable()->default(0);
            $table->integer('user_id')->nullable()->default(0); // 前台用户留言ID
            $table->integer('check')->nullable()->default(0);
            $table->integer('ranking')->nullable()->default(0); // 置顶
            $table->integer('language_id')->nullable()->default(0);
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
        Schema::dropIfExists('b_comments');
    }
}
