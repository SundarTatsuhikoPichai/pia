<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ClubMemberWatching extends Model
{
    protected $table   = 'club_member_watching';
    protected $guarded = ['id'];

    public function members() {

        return $this->belongsTo(ClubMembers::class);
    }

    public function valid($input) {
        $rules = [
            'club_member_id'        => 'required|integer',
            'watched_at'            => 'required|date',
            'opponent_of_club_code' => 'required|max:10',
            'home_away'             => 'required|max:10'
        ];

        return Validator::make($input, $rules);
    }
}
