<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteVisitorController extends Controller
{

    // Menampilkan halaman special note
    public function index()
    {

        return view('visitor.note');
    }
    public function updateSpecialNote(Request $request)
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Ambil data visitor yang memiliki user_id yang sama dengan user yang sedang login
        $visitor = Visitor::where('user_id', $user->id)->first();

        // Update kolom special_note pada visitor dengan data yang diberikan
        $visitor->special_note = $request->input('special_note');
        $visitor->save();

        return redirect()->back()->with('success', 'Special note updated successfully.');
    }
}
