<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class countryModel extends Model
{
	 use  Notifiable;
    protected $table = "_z_country";
    public $timestamps = false;

    protected $fillable = [
         'iso', 'name', 'dname', 'iso3', 'position', 'numcode', 'phonecode', 'created', 'register_by', 'modified', 'modified_by', 
    ];
}
   