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

    public function create(Request $request) {

        $input = $request->all();
        $valid = Clubs::valid($input);

        if(!$valid->fails()){

            $imgFile = $input['image_name'];
            $timeFileName =  time().".jpg";
            $imgFile->move(public_path(). '/img', $timeFileName);

            $club = new Clubs;
            $club->club_code    = $input['club_code'];
            $club->club_name    = $input['club_name'];
            $club->stadium_name = $input['stadium_name'];
            $club->postal_code  = $input['postal_code'];
            $club->image_name   = $timeFileName;

            //Insert clubdata
            if(!empty(Clubs::registerClubInfo(json_decode(json_encode($club), true)))){
                print_r("オッケー");
                $msg = "正常に保存されました。";
            } else {
                //Delete uploadfile
                unlink(public_path(). '/img/' .$timeFileName);
                $msg = "登録に失敗しました。";
            }

        } else {
            $msg = 'データを取得できませんでした。';
        }

        // Return view
        $view = view('')->with('msg', $msg);
        return $view;


        //print_r($input);

        // if($valid->fails()) {
        //     //メッセージ取り出してViewに渡す
        //     //リダイレクト


        // } else {
        //     //データベースに保存

        // }
    }


    //clubs data acquisition
    public function acquisition(){
        $clubdatas = Clubs::all();
        return view('inputclubdata/clubList')->with('clubs', $clubdatas);
    }
}
