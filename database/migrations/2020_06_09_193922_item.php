<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Item extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_code');
            $table->longText('item_guarantee');
            $table->string('item_name');
            $table->integer('image_id');
            $table->integer('system_id');
            $table->integer('supplier_id');
            $table->string('item_screen');
            $table->integer('item_bcamera');
            $table->integer('item_fcamera');
            $table->string('item_cpu');
            $table->integer('item_ram');
            $table->integer('item_memory');
            $table->integer('item_memorystick');
            $table->integer('item_battery');
            $table->integer('item_price');
            $table->integer('item_discount');
            $table->integer('item_amount');
            $table->integer('item_sell');
            $table->integer('item_view');
            $table->string('item_description');
            $table->longText('item_detail');
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
        Schema::dropIfExists('item');
    }
}
