<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('item_id');
            $table->integer('amounts');
            $table->integer('unit_price');
            $table->integer('total_price');
            $table->string('item_guarantee');
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
        Schema::dropIfExists('sub_order');
    }
}
