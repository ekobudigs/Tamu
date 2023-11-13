<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorSurveyController extends Controller
{
    // create function visitor survey binding id
    public function index($id)
    {
        // find visitor id
        $visitor = Visitor::findOrFail($id);
        // return view visitor survey
        return view('visitor_survey.create', compact('visitor'));
    }
}
