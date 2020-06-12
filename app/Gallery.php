<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table='image';
    protected $fillable = ['image_name', 'image_url'];
    public $timestamps = true;
}
