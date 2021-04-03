<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBPermissionsAndRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 角色表
        Schema::create('b_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->default('');
            $table->string('description', 250)->default('');
            $table->timestamps();
        });

        // 权限表
        Schema::create('b_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->default('');
            $table->string('description', 250)->default('');
            $table->timestamps();
        });

        // 权限角色表
        Schema::create('b_permission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->integer('permission_id');
            $table->timestamps();
        });

        // 用户角色表
        Schema::create('b_role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_roles');
        Schema::dropIfExists('b_permissions');
        Schema::dropIfExists('b_permission_role');
        Schema::dropIfExists('b_role_user');
    }
}
