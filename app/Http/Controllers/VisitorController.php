<?php

namespace App\Http\Controllers;

use App\DataTables\VisitorsDataTable;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(VisitorsDataTable $dataTable)
    {
        return $dataTable->render('visitor.index');
    }
}
