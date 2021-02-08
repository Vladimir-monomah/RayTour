<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model
{

    public $timestamps = false;

    

    protected $table = 'foot_menu';




    protected $fillable = [
 
				'name', 
				'parent', 
				'btxt', 

    ];




    protected $casts = [
        'complete' => 'boolean',
    ];




}
