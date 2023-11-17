<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class ScanController extends Controller
{

    public function index()
    {
        return view('scan.index');
    }


    public function getVisitor(Request $request)
    {
        $visitor = Visitor::where('id', $request->id)->first();
        if ($visitor) {
            return redirect()->route('scan.index', ['visitor' => $visitor])->with('success', 'Visitor successfully scanned.');
        } else {
            return redirect()->back()->with('error', 'Visitor not found.');
        }
    }


    public function store(Request $request)
    {
        $visitor = Visitor::where('id', $request->id)->first();
        if ($visitor) {
            $visitor->update([
                'status' => '1'
            ]);
            return redirect()->back()->with('success', 'Visitor successfully scanned.');
        } else {
            return redirect()->back()->with('error', 'Visitor not found.');
        }
    }
}
