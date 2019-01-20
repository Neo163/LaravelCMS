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
            $table->increments('id');
            $table->string('title', 150)->default('');
            $table->text('content')->nullable();
            $table->string('image', 255)->nullable()->default('');
            $table->string('ranking', 10)->nullable()->default('');
            $table->string('recycle', 10)->default(1); // 默认1显示，2回收，3删除
            $table->integer('user_id')->default(0);
            $table->integer('view')->default(0);
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

