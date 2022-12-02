<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('store_name')->nullable();
            $table->string('partner_id')->nullable();
            $table->string('pin_lock')->nullable();
            $table->time('store_open')->nullable();
            $table->time('store_close')->nullable();
            $table->string('address')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('buku_rekening')->nullable();
            $table->integer('point')->nullable();
            $table->double('credit_limit', 12)->nullable();
            $table->string('subscription')->nullable();
            $table->integer('max_load')->nullable();
            $table->integer('default_agent')->nullable()->default(0);
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
        Schema::dropIfExists('agents');
    }
}
