<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCats extends Model
{
   
    public $timestamps = false;
    /*
     * Table name
     */
    protected $table = 'subcat';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'name',
        'img',
        'parent',
    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];

    public function category()
    {
    	return $this->belongsTo(Cats::class, 'parent', 'id');
    }

}