<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    //
    use SoftDeletes; 

    protected $fillable = [
        'firstname',
        'lastname',
        'email'
    ];
}
