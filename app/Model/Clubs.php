<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;

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
            'postal_code'   => 'required|min:8|max:8',
            'image_name'    => 'required'
        ];
        return Validator::make($input, $rules);
    }

    /**
     * [registerClubInfo description]
     * @param  [Clubs] $club
     * @return [int] clubId
     */
    public static function registerClubInfo($club) {

        return DB::table('clubs')->insertGetId($club);
    }
}
