<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\ClubMemberShip;

class ClubMemberShipController extends Controller
{
    //
    public function update(Request $request) {

        $id = $request->input('id');
        $memberShipId = $request->input('memberShipId');
        $memberShipInput = $request->input('memberShipInput.'.$memberShipId);

        $clubMemberShip = ClubMemberShip::where('id', $memberShipId)->first();
        $clubMemberShip->membership_name = $memberShipInput;

        // Validation input
        $valid = ClubMemberShip::valid([
            'club_id' => $memberShipId,
            'membership_name' => $memberShipInput,
            'membership_grade' => $clubMemberShip->membership_grade
        ]);
        if($valid->fails()) {
            return redirect('/inputclubdata/clubList')->withErrors($valid);
        }

        // Update membership
        if($clubMemberShip->save()) {
            $msg = '会員ランクが更新されました';
        } else {
            $msg = '会員ランクが更新されませんでした';
        }

        // Return view
        $view = view('clubmembership/msg')->
                    with('msg', $msg);
        return $view;
    }

    public function delete(Request $request) {

        $id = $request->input('id');
        $memberShipId = $request->input('memberShipId');

        if(ClubMemberShip::where('id', $memberShipId)->first()->delete()) {
            $msg = '会員ランクが削除されました';
        } else {
            $msg = '会員ランクが削除されませんでした';
        }

        // Return view
        $view = view('clubmembership/msg')->
                    with('msg', $msg);
        return $view;
    }

    public function create(Request $request) {

        $id = $request->input('id');
        $memberA = $this->collectMemberShip($request->input('member_a'), $id, 'SS会員');
        $memberB = $this->collectMemberShip($request->input('member_b'), $id, '有料会員');
        $memberC = $this->collectMemberShip($request->input('member_c'), $id, '無料会員');

        $mergedMemberShip = $memberA->merge($memberB)->merge($memberC);

        // Validation membership
        $mergedMemberShip->each(function ($item) use($id) {
            $valid = ClubMemberShip::valid($item);
            if($valid->fails()) {
                return redirect('/inputclubdata/edit?id='.$id)->withErrors($valid);
            }
        });

        // Save membership
        if(ClubMemberShip::registerClubMembership($mergedMemberShip->all())) {
            $msg = '会員ランクが正常に保存されました';
        } else {
            $msg = '会員ランクを保存できませんでした';
        }

        // Return view
        $view = view('inputclubdata/create')->
                    with('msg', $msg);
        return $view;
    }

    // Input to membership
    private function collectMemberShip($input, $id, $grade) {
        return collect($input)->filter(function($item) {
            return !empty($item);
        })->map(function($item) use($id, $grade) {
            return [
                'club_id'           => $id,
                'membership_name'   => $item,
                'membership_grade'  => $grade
            ];
        });
    }
}
