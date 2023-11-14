<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanController extends Controller
{

    public function index()
    {
        // tampilkan view scan
        return view('scan.index');
    }
}
