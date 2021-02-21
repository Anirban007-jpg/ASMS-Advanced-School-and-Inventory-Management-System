<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('usertype')->default('Super-Admin');
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->integer('is_email_verified')->default(0);
            $table->integer('is_phone_verified')->default(0);
            $table->string('email_verification_code')->nullable();
            $table->integer('verification_code')->nullable();
            $table->string('image')->nullable();
            $table->longText('address')->nullable();
            $table->string('gender')->nullable();
            $table->integer('status')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
