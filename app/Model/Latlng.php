<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Latlng extends Model
{
    //
    protected $table   = 'latlng';
    protected $guarded = ['id'];
    public $timestamps = false;
}
