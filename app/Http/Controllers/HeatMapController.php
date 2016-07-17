<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Model\Latlng;
use App\Model\Clubs;
use App\Model\ClubMembers;

class HeatMapController extends Controller
{
    //
    public function index(Request $request) {

        $years = $this->years();
        $clubs = $this->clubs();
        $view = view('heatmap/index')->with('years', $years)->with('clubs', $clubs);

        if($request->isMethod('post')) {

            $input = $request->all();
            $request->session()->flash('year',    $input['year']);
            $request->session()->flash('club_id', $input['club_id']);

            $selectedClub = Clubs::find($input['club_id']);
            $homeStadiumLatlng = Latlng::where('postal_code', $selectedClub['postal_code'])->first();

            $members = ClubMembers::where('year', $input['year'])
                        ->where('club_id', $input['club_id'])
                        ->get();

            $mapedLatlngs = $members->groupby('postal_code')->map(function ($item) {
                $latlng = Latlng::where('postal_code', $item->first()['postal_code'])->first();
                return ['lat' => $latlng['lat'], 'lng' => $latlng['lng'], 'count' => $item->count()];
            });

            $view = $view->with('homeStadiumLatlng', $homeStadiumLatlng)
                    ->with('mapedLatlngs', $mapedLatlngs->take(200));

        }

        return $view;
    }

    private function clubs() {
        $clubsCollection = Clubs::all();
        return array_column($clubsCollection->all(), 'club_name', 'id');
    }

    private function years() {
        $yearsCollection = collect(DB::table('club_members')->
                    select('year')->
                    distinct()->get());
        return $yearsCollection->map(function ($item) {
            return $item->year;
        });
    }
}
