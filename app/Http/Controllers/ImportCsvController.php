<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Clubs;
use App\Model\ClubMembers;
use App\Model\NameAggregation;
use App\Model\RegisteredCSV;

class ImportCsvController extends Controller
{
    //
    public function index() {
        // Get all clubs
        $clubs = Clubs::all();
        // Get all RegisteredCSV
        $csvFiles = RegisteredCSV::all();
        // Return view
        $view = view('importcsv/index')
                        ->with('clubs', $clubs)
                        ->with('csvFiles', $csvFiles);
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
            // Aggregation by Name
            $uniqueMembers = NameAggregation::execute($clubMembers);

            // Validation success
            if($uniqueMembers['result']) {
                // Insert clubmembers
                ClubMembers::registerClubMembers($uniqueMembers['data']);
                // Create message
                $msg = '正常に保存されました。データ件数：' . count($clubMembers) . '件 / サマリ件数：' . count($uniqueMembers['data']) . '件';
                // Register filename
                $registerFileName = new RegisteredCSV;
                $registerFileName->file_name = $csvFileName;
                $registerFileName->save();
            } else {
                // Validation failure
                $msg = '名寄せに失敗しました。CSVデータまたはクラブ情報をご確認ください。';
            }
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
