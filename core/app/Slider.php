<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    public $timestamps = false;

    

    protected $table = 'slider_home';




    protected $fillable = [
 
				'img', 
				'btxt', 
				'stxt', 

    ];




    protected $casts = [
        'complete' => 'boolean',
    ];

}
