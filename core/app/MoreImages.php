<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoreImages extends Model
{

    public $timestamps = false;

    

    protected $table = 'moreimg';




    protected $fillable = [

				'assignto', 
				'img', 

    ];




    protected $casts = [
        'complete' => 'boolean',
    ];


}
