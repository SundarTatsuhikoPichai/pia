<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function populationPyramid() {
        return view('populationpyramid/index');
    }

    public function heatMap() {
        return view('heatmap/index');
    }

    public function inputClubData() {
        return view('inputclubdata/index');
    }

    public function importCsv() {
        return view('importcsv/index');
    }
}
