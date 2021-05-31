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
            $table->text('content')->nullable();
            $table->string('category', 30)->default('');
            $table->string('username', 50)->default('');
            $table->integer('user_id')->nullable()->default(0); // 前台用户留言ID
            $table->integer('b_post_id')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0); // 0 未审核，1 通过审核
            $table->integer('report')->nullable()->default(0); // 0 默认，1 举报
            $table->string('ip', 30)->default('');
            $table->integer('parent')->nullable()->default(0);
            $table->integer('ranking')->nullable()->default(0); // 置顶
            $table->integer('language_id')->nullable()->default(0);
            $table->string('remark', 100)->default('');
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
