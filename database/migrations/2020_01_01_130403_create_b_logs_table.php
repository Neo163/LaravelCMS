<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_logs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->default('');
            $table->string('description', 1000)->nullable();
            $table->string('category', 50)->default('');
            $table->string('ip', 25)->default('');
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
        Schema::dropIfExists('b_logs');
    }
}
