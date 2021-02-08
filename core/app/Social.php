<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{

    public $timestamps = false;

    

    protected $table = 'social';




    protected $fillable = [
 
				'fb', 
				'tw', 
				'gp', 
				'li', 
				'yt', 

    ];




    protected $casts = [
        'complete' => 'boolean',
    ];

}
