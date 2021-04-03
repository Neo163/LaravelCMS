<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_paragraphs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->default('');
            $table->text('content')->nullable();
            $table->string('category', 100)->default('');
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
        Schema::dropIfExists('b_paragraphs');
    }
}
