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
        $visitor = Visitor::where('no_visitors', $request->no_visitors)->first();
    
        if ($visitor) {
            return response()->json([
                'status' => 'success',
                'message' => 'Visitor successfully scanned.',
                'visitor' => $visitor,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Visitor not found.',
            ]);
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
