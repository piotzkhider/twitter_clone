<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url_name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('display_name')->nullable();
            $table->text('description')->nullable();
            $table->string('profile_image_url')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * マイグレーションを戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
