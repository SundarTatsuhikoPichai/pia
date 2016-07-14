<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Clubs;
use App\Model\ClubMemberShip;

class InputClubDataController extends Controller {

    public function index() {
        return view('inputclubdata/index');
    }

    public function clubList() {
        return view('inputclubdata/clubList');
    }

    public function updateClubData(Request $request) {
        $id = $request->input('id');

        $club = Clubs::find($id);

        // Return view
        $view = view('inputclubdata/updateClubData')
                        ->with('club', $club);
        return $view;
    }

    public function create(Request $request) {

        $input = $request->all();
        print_r($input);

    }

    public function createMemberShip(Request $request) {
        $rank = $request->input('member_a');
        $valid = ClubMemberShip::valid($rank);

        if($valid->fails()) {
            $clubMemberShip = new ClubMemberShip;
            $clubMemberShip->membership_name = $input['membership_name'];
        }

        if(!empty(ClubMemberShip::registerClubMembership(json_decode(json_encode($clubMemberShip), true)))){
                $msg = "正常に保存されました。";
            } else {
                $msg = "登録に失敗しました。";
            }
    }

    public function update(Request $request) {

        $id = $request->input('id');
        $memberShipData = ClubMemberShip::find($id);

    }

    //clubs data acquisition
    public function acquisition(){
        $clubdatas = Clubs::all();
        return view('inputclubdata/clubList')->with('clubs', $clubdatas);
    }
}
