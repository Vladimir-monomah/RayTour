<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    public $timestamps = false;

    protected $table = 'general_setting';

    protected $fillable = [

				'sitename', 
				'address', 
				'mobile', 
				'email', 
				'currency', 

    ];




    protected $casts = [
        'complete' => 'boolean',
    ];

}
