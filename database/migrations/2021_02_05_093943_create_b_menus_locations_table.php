<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBMenusLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_menus_locations', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->default('');
            $table->integer('b_menu_category_id')->nullable()->default(1);
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
        Schema::dropIfExists('b_menus_locations');
    }
}
