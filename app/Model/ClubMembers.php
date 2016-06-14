<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ClubMembers extends Model
{
    protected $table   = 'club_members';
    protected $guarded = ['id'];

    public function memberWatchings() {

        return $this->hasMany(ClubMemberWatching::class);
    }

    public function valid($input) {
        $rules = [
            'member_id'          => 'required|max:50',
            'club_id'            => 'required|integer',
            'year'               => 'required|integer|digits:4',
            'sex'                => 'required|min:1|max:1',
            'birth_day'          => 'required|date',
            'postal_code'        => 'required|min:8|max:8',
            'address1'           => 'required|max:50',
            'address2'           => 'required|max:50',
            'address3'           => 'required|max:50',
            'address4'           => 'required|max:50',
            'first_name_kana'    => 'required|max:50',
            'last_name_kana'     => 'required|max:50',
            'club_membership_id' => 'required'
        ];

        return Validator::make($input, $rules);
    }
}
