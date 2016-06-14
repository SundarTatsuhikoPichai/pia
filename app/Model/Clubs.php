<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Clubs extends Model
{
    //
    protected $table = 'clubs';

    protected $guarded = ['id'];

    public function valid($input) {
        $rules = [
            'club_code'     => 'required|unique:clubs|max:10',
            'club_name'     => 'required|max:100',
            'stadium_name'  => 'required|max:100',
            'postal_code'   => 'required|numeric|digits_between:7,8'
        ];
        return Validator::make($input, $rules);
    }
}
