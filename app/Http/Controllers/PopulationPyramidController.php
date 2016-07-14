<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PopulationPyramidController extends Controller
{
    public function index() {
        return view('populationpyramid/index');
    }
}
