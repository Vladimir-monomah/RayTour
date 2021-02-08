<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FootHead extends Model
{



    public $timestamps = false;

    

    protected $table = 'foot_head';




    protected $fillable = [
 
				'n1', 
				'n2', 
				'n3', 

    ];




    protected $casts = [
        'complete' => 'boolean',
    ];


}
