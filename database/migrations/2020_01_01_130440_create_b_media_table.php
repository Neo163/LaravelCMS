<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_media', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->default(''); // alt的名称
            $table->string('fix_link', 255)->default(''); // 文章、页面引用的固定链接
            $table->string('month', 50)->nullable(); // 日期命名
            $table->string('size', 50)->nullable(); // 换算成输出的单位
            $table->integer('size_count')->nullable(); // 使用字节byte做基本单位，用来计算总量大小
            $table->integer('b_media_category_id')->nullable()->default(0);
            $table->integer('b_user_id')->nullable()->default(0);
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
        Schema::dropIfExists('b_media');
    }
}
