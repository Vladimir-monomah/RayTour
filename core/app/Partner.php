<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;

    

    protected $table = 'brand_logo';




    protected $fillable = [
 
				'img', 

    ];




    protected $casts = [
        'complete' => 'boolean',
    ];
}
