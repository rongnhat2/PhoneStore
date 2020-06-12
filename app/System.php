<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
	protected $table='system';
    protected $fillable = ['system_name', 'system_view'];
    public $timestamps = true;
}
