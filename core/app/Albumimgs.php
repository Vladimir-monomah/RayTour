<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albumimgs extends Model
{
    public $timestamps = false;

    protected $table = 'albumdetails';

    protected $fillable = [

		
				'des', 
                'img',
				'parent',
                
    ];




    protected $casts = [
        'complete' => 'boolean',
    ];


    public function alb()
    {
        return $this->belongsTo(Album::class, 'parent');
    }

}
