<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ClubMemberShip extends Model
{
    protected $table = 'club_membership';
    protected $guarded = ['id'];

    public function valid($input){
        $rules = [
            'club_id'          => 'required',
            'membership_name'  => 'required|max:50',
            'membership_grade' => 'required|max:10'
        ];

        return Validator::make($input, $rules);
    }
}
