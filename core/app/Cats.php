<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{

    public $timestamps = false;
    /*
     * Table name
     */
    protected $table = 'cat';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'name',
        'img',
    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];




    public function tours()
    {
        return $this->hasMany(Tour::class, 'parent');
    }


}
