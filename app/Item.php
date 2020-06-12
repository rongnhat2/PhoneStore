<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table='item';
    protected $fillable = ['item_code', 'item_guarantee', 'item_name', 'image_id', 'system_id', 'supplier_id', 'item_screen', 'item_bcamera', 'item_fcamera', 'item_cpu', 'item_ram', 'item_memory', 'item_memorystick', 'item_battery', 'item_price', 'item_discount', 'item_amount', 'item_sell', 'item_view', 'item_description', 'item_detail'];
    public $timestamps = true;
}
