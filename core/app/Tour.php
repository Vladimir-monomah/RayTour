<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{

    public $timestamps = false;
    /*
     * Table name
     */
    protected $table = 'tours';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
       



				'name', 
				'rate', 
				'parent',
				'img', 
				'description',
				'inc',
				'exc',
				'loc', 
				'dur',
				'featured',




    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];



    public function cat()
    {
        return $this->belongsTo(Cats::class, 'parent');
    }




}
