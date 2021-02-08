<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $timestamps = false;

    protected $table = 'orrdr';

    protected $fillable = [

				'name', 
				'tours_id', 
				'address',
				'mobile', 
				'email', 
				'dt',
				'numppl',
				'tm',
				'stat',
                
    ];




    protected $casts = [
        'complete' => 'boolean',
    ];


    public function tours()
    {
        return $this->belongsTo('App\Tour');
    }


}
