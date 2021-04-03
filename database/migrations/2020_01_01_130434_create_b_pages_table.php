<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->default('');
            $table->text('content')->nullable();
            $table->integer('content_show')->nullable()->default(0);
            $table->string('image', 1000)->nullable()->default('');
            $table->text('structure')->nullable(); // 保存json数据，负责统计后端输入的数据结构
            $table->string('template', 50)->default('default');
            $table->integer('b_user_id')->nullable()->default(0);
            $table->integer('language_id')->nullable()->default(0);
            $table->integer('view')->nullable()->default(0);
            $table->integer('ranking')->nullable()->default(0); // 置顶
            $table->integer('recycle')->nullable()->default(0);
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
        Schema::dropIfExists('b_pages');
    }
}
