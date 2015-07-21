<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
    	'name', 'info'
    ];
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
