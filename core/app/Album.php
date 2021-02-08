<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    public $timestamps = false;

    protected $table = 'albums';

    protected $fillable = [

				'name', 
				'des', 
				'img',
                
    ];




    protected $casts = [
        'complete' => 'boolean',
    ];



    public function imgs()
    {
        return $this->hasMany(Albumimgs::class, 'parent');
    }



}
