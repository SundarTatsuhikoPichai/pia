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


        //画像を取得
        $imgFile =$request->file('');

        if ($request->has('') && $imgFile->isValid()) {
            //画像名を取得
            $imgFileName = $imgFile->getClientOriginalName();

            //public/imgフォルダに画像を保存
            $imgFile->move(storage_path(). '/public/img', $imgFileName);

            //画像名をtimeでリネーム
            if(rename($imgFileName,time().".jpg")){
                $msg = "正常に保存されました。";
            };

        } else {
            $msg = "ファイルが見つかりませんでした。";
        }


        print_r($input);

        // if($valid->fails()) {
        //     //メッセージ取り出してViewに渡す
        //     //リダイレクト


        // } else {
        //     //データベースに保存

        // }
    }
}
