<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUpdate extends Model
{
    protected $fillable = ['mid','sid',];

    protected $table = 'DataUpdate';
    public $timestamps = false;

    public function menu(){
    	return $this->belongsTo('App\Menu','mid','id');
    }

    public function submenu(){
    	return $this->belongsTo('App\Submenu','sid','id');
    }
}
