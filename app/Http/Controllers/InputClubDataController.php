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
        $clubs = Clubs::getClubInfo();
        return view('inputclubdata/clubList', ['clubs' => $clubs]);
    }

    public function edit(Request $request) {
        $id = $request->input('id');
        $club = Clubs::find($id);
        $clubMembership = ClubMembership::where('club_id', $id)->get();

        $clubMembershipA = $this->filterMemberShip($clubMembership, 'SS会員');
        $clubMembershipB = $this->filterMemberShip($clubMembership, '有料会員');
        $clubMembershipC = $this->filterMemberShip($clubMembership, '無料会員');

        // Return view
        $view = view('inputclubdata/edit')
                    ->with('club', $club)
                    ->with('clubMembershipA', $clubMembershipA)
                    ->with('clubMembershipB', $clubMembershipB)
                    ->with('clubMembershipC', $clubMembershipC);
        return $view;
    }

    private function filterMemberShip($clubMembership, $grade) {
        return $clubMembership->filter(function($item) use($grade) {
            return $item['membership_grade'] === $grade;
        });
    }

    public function update(Request $request) {
        $id = $request->input('id');
        Clubs::find($id)->update($request->all());
        // Return view
        $view = view('inputclubdata/create')
                    ->with('msg', 'クラブ情報が更新されました');
        return $view;
    }

    public function delete(Request $request) {
        $id = $request->input('id');
        Clubs::find($id)->delete();
        // Return view
        $view = view('inputclubdata/create')
                    ->with('msg', 'クラブ情報が削除されました');
        return $view;
    }

    public function create(Request $request) {

        $input = $request->all();
        $valid = Clubs::valid($input);

        if(!$valid->fails()){

            $imgFile = $input['image_name'];
            $timeFileName =  time().".jpg";
            $imgFile->move(public_path(). '/appimg', $timeFileName);

            $club = new Clubs;
            $club->club_code    = $input['club_code'];
            $club->club_name    = $input['club_name'];
            $club->stadium_name = $input['stadium_name'];
            $club->postal_code  = $input['postal_code'];
            $club->image_name   = $timeFileName;

            //Insert clubdata
            if(!empty(Clubs::registerClubInfo(json_decode(json_encode($club), true)))){
                $msg = "正常に保存されました。";
            } else {
                //Delete uploadfile
                unlink(public_path(). '/img/' .$timeFileName);
                $msg = "登録に失敗しました。";
            }

            // Return view
            $view = view('inputclubdata/create')->
                        with('msg', $msg);
            return $view;


        } else {
            return redirect('/inputclubdata')->withErrors($valid);
        }

    }


    //clubs data acquisition
    public function acquisition(){
        $clubdatas = Clubs::all();
        return view('inputclubdata/clubList')->with('clubs', $clubdatas);
    }
}
