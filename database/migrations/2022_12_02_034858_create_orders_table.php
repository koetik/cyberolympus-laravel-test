<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_link')->nullable();
            $table->dateTime('payment_date', 0)->nullable();
            $table->string('buy_by')->nullable();
            $table->double('payment_total', 12)->nullable();
            $table->integer('coupon_id')->nullable();
            $table->string('payment_discount_code')->nullable();
            $table->double('payment_discount', 12)->nullable();
            $table->double('payment_final', 12)->nullable();
            $table->float('order_weight', 12)->nullable();
            $table->float('order_distance', 12)->nullable()->default(0);
            $table->integer('delivery_status')->nullable();
            $table->double('delivery_fee', 12)->nullable();
            $table->string('delivery_track')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('delivery_date')->nullable();
            $table->dateTime('order_time', 0)->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
