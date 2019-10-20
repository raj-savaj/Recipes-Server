<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = [
        'mid','name_Gujrati','image','name_Hindi','name_English','discription_Gujrati','discription_Hindi','discription_English',
    ];

    protected $table = 'submenu';
    public $timestamps = false;

    public function menu()
    {
    	return $this->belongsTo('App\Menu');
    }
}
