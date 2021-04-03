<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBMediaCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_media_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->default('');
            $table->integer('sort')->nullable()->default(0);
            $table->integer('parent')->nullable()->default(0);
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
        Schema::dropIfExists('b_media_categories');
    }
}
