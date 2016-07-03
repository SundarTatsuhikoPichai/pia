<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Clubs;
use App\Model\ClubMembers;

class ImportCsvController extends Controller
{
    //
    public function index() {
        // Get all clubs
        $clubs = Clubs::all();
        // Return view
        $view = view('importcsv/index')->
                    with('clubs', $clubs);
        return $view;
    }

    public function create(Request $request) {

        // Get request file
        $csvFile = $request->file('importCsv');
        // Has input & File exists
        if ($request->has('clubId') && $csvFile->isValid()) {
            // Extract filename & year
            $csvFileName = $csvFile->getClientOriginalName();
            $year = $this->extractYear($csvFileName);

            // Save csv
            $csvFile->move(storage_path(). '/csv', $csvFileName);
            // Read member data from csv
            $clubMembers = ClubMembers::readFromCSV($request->input('clubId'), $year, $csvFileName);
            // Insert clubmembers
            ClubMembers::registerClubMembers($clubMembers);
            // Create message
            $msg = '正常に保存されました。 サマリ：' . count($clubMembers) . '件';
            
        } else {
            // Create message
            $msg = 'ファイルが見つかりませんでした。';
        }

        // Return view
        $view = view('importcsv/create')->
                    with('msg', $msg);
        return $view;
    }

    /**
     * [extractYear description]
     * @param  [type] string $fileName [description]
     * @return [type] string
     */
    private function extractYear($fileName) {
        return substr($fileName, 3, 4);
    }
}
