<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'contact',
        'designation',
        'city',
        'country'
               
    ];
}
