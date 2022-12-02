<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('pin')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('phone_verified_at', 0)->nullable();
            $table->integer('account_type')->nullable();
            $table->string('account_role')->nullable();
            $table->string('photo')->nullable();
            $table->dateTime('last_login', 0)->nullable();
            $table->string('password_reset_code')->nullable();
            $table->string('device_token')->nullable();
            $table->string('account_status')->nullable()->default('1');
            $table->string('password')->nullable();
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
        Schema::dropIfExists('users');
    }
}
