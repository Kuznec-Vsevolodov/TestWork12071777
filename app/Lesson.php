<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'desc', 'credit_quantity',
    ];


    public function students(){
        return $this->belongsToMany('App\Students');
    }
}
