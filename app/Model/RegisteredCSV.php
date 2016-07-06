<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegisteredCSV extends Model
{
    protected $table   = 'registered_csv';
    protected $guarded = ['id'];
    public $timestamps = true;
}
