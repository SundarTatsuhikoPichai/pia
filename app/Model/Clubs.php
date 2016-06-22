<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Clubs extends Model
{
    protected $table = 'clubs';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function valid($input) {
        $rules = [
            'club_code'     => 'required|unique:clubs|max:10',
            'club_name'     => 'required|max:100',
            'stadium_name'  => 'required|max:100',
            'postal_code'   => 'required|numeric|digits_between:7,8'
        ];
        return Validator::make($input, $rules);
    }

    /**
     * [registerClubInfo description]
     * @param  [Clubs] $club
     * @return void
     */
    public static function registerClubInfo($club) {

        $clubs = new Clubs;
        $clubs->club_code    = $club['club_code'];
        $clubs->club_name    = $club['club_name'];
        $clubs->stadium_name = $club['stadium_name'];
        $clubs->postal_code  = $club['postal_code'];

        return $clubs->save();
    }
}
