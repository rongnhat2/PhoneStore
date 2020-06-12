<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
	protected $table='warehouse';
    protected $fillable = ['user_id', 'item_id', 'qty_item', 'created_at', 'updated_at'];
    // public $timestamps = true;
}
