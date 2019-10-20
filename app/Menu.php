<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name_Gujrati','name_Hindi','name_English','image',
    ];

    protected $table = 'menu';
    public $timestamps = false;
}
