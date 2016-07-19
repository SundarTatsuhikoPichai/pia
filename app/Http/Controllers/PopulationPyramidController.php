<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Clubs;
use App\Model\ClubMembers;
use App\Model\RegisteredCSV;
use Request;
use DB;

class PopulationPyramidController extends Controller
{
    public function index() {
        $registeredCSVs = RegisteredCSV::all();
        $clubs = [];
        foreach ($registeredCSVs as $registeredCSV) {
            $clubs[] = array(
                'id'        => implode(DB::table('clubs')
                    ->where('club_code', '=',
                        $this->extractClubCode($registeredCSV['file_name']))
                    ->pluck('id')),
                'club_name' => implode(DB::table('clubs')
                    ->where('club_code', '=',
                        $this->extractClubCode($registeredCSV['file_name']))
                    ->pluck('club_name')),
                'year'      => $this->extractYear($registeredCSV['file_name'])
            );
        }

        // $collection = collect($clubs);
        // $grouped = $collection->groupBy('club_name');

        // distinct club_name
        $clubNames = array();
        foreach ($clubs as $club) {
            $clubNames[] = $club['club_name'];
        }
        $clubNames = array_unique($clubNames);

        return view('populationpyramid/index')
                    ->with('clubs', $clubs)
                    ->with('clubNames', $clubNames);
    }

    public function clubMembers() {
        if (Request::ajax()) {
            $req = Request::all();
            $dataArray = ClubMembers::makePopulationPyramid(
                $req['club_name'], $req['year'], $req['member_grade']
            );
        }

        return response()->json($dataArray);
    }

    private function extractYear($fileName) {

        return substr($fileName, 3, 4);
    }

    private function extractClubCode($fileName) {

        return substr($fileName, 0, 2);
    }
}
