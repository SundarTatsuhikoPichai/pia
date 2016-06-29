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

    public function create(Request $request) {


        $input = $request->all();
        // $valid = Clubs::valid($input);

        print_r($input);

        // if($valid->fails()) {
        //     //メッセージ取り出してViewに渡す
        //     //リダイレクト


        // } else {
        //     //データベースに保存

        // }
    }
}
