<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;

class ClubMemberShip extends Model
{
    protected $table = 'club_membership';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static function valid($input){
        $rules = [
            'club_id'          => 'required',
            'membership_name'  => 'required|max:50',
            'membership_grade' => 'required|max:10'
        ];

        return Validator::make($input, $rules);
    }

    /**
     * regist clubMembership
     *
     * @return [bool]
     */
    public static function registerClubMembership(array $clubMemberships) {

        return DB::table('club_membership')->insert($clubMemberships);
    }

    public static function updateClubMembership(array $clubMemberships) {
        // foreach ($clubMemberships as $clubMembership) {
        //     if ($clubMembership->id) {
        //         $clubMembership->save();
        //     }
        // }
    }
}
