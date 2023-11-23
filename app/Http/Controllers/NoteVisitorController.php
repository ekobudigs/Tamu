<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteVisitorController extends Controller
{

    public function index($id)
    {
        // Mengambil data Visitor berdasarkan ID
        $visitor = Visitor::find($id);
    
        // Memeriksa apakah data ditemukan
        if ($visitor) {
            // Mengirim data Visitor ke view
            return view('visitor.note', compact('visitor'));
        } else {
            // Jika data tidak ditemukan, bisa menangani sesuai kebutuhan, misalnya redirect atau menampilkan pesan kesalahan.
            return redirect()->route('visitors.index')->with('error', 'Visitor not found');
        }
    }
    
    public function updateSpecialNote(Request $request)
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Ambil data visitor yang memiliki user_id yang sama dengan user yang sedang login
        $visitor = Visitor::where('id', $request->id)->first();

        // Update kolom special_note pada visitor dengan data yang diberikan
        $visitor->special_note = $request->input('special_note');
        $visitor->save();

        return redirect()->back()->with('success', 'Special note updated successfully.');
    }
}
