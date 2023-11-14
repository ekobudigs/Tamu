<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\VisitorSurvey;

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

    // create function visitorsurvey store


    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'survey_answer' => 'required',
            'survey_scale' => 'required',
        ]);

        // create visitor survey
        $visitorSurvey = VisitorSurvey::create([
            'user_id' => $request->user()->id,
            'visitor_id' => $request->visitor_id,
            'survey_answer' => $request->survey_answer,
            'survey_scale' => $request->survey_scale,
        ]);

        // return redirect visitor survey
        return redirect()->route('visitors.index')->with('success', 'Survey berhasil ditambahkan');
    }
}
