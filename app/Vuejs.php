<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuejs extends Model
{
    protected $table = 'curd';
    protected $fillable = [
        'name', 'email', 'address', 'phone', 'occupation'
    ];
}
