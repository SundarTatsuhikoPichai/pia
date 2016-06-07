<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClubMemberShip extends Model
{
    //
    protected $table = 'club_membership';
    protected $guarded = ['id'];

    private function vald($input){
      $rules = [
        'club_id' => 'required',
        'membership_name' => 'required|max:50',
        'membership_grade'=> 'required|max:10'
      ];

      return Validator::make[$input,$rules];
    }
}
