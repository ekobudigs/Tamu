<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\DataTables\VisitorsDataTable;
use App\Http\Requests\VisitorRequest;
use Illuminate\Support\Carbon;

class VisitorController extends Controller
{
    public function index(VisitorsDataTable $dataTable)
    {
        return $dataTable->render('visitor.index');
    }

    public function create()
    {
        // Kode statis
        $kodeStatis = 'TMU';
        $monthYear = date('m/y');

        // Mengambil kode terbaru dari database
        $latestAnggota = Visitor::latest('created_at')->first();

        if ($latestAnggota) {
            $latestKode = $latestAnggota->number_anggota;
        } else {
            // Handle the case when no loan records are found
            $latestKode = null; // or assign a default value
        }

        // Memecah kode menjadi 3 bagian
        $kodeArray = explode('/', $latestKode);
        $kodeBagian1 = isset($kodeArray[0]) ? substr($kodeArray[0], 3) : 0;
        $kodeBagian2 = isset($kodeArray[1]) ? $kodeArray[1] : $monthYear;
        $kodeBagian3 = isset($kodeArray[2]) ? $kodeArray[2] : $monthYear;

        $final = $kodeBagian2 . '/' . $kodeBagian3;
        // Mengambil bulan dan tahun saat ini
        $monthYear = date('m/y');

        if ($kodeBagian3 !== null && $monthYear === $final) {
            // Jika kode terakhir sudah menggunakan bulan dan tahun saat ini, maka increment nomor kode terakhir
            $latestKodeNumber = (int) $kodeBagian1 + 1;
        } else {
            // Jika kode terakhir tidak menggunakan bulan dan tahun saat ini, maka nomor kode terakhir di-reset menjadi 1
            $latestKodeNumber = 1;
        }

        // Format nomor kode agar menjadi 3 digit
        $nextNumberStr = str_pad($latestKodeNumber, 3, '0', STR_PAD_LEFT);

        // Generate kode baru
        $newKode = $kodeStatis . $nextNumberStr . '/' . $monthYear;



        $departments = Department::pluck('name', 'id');


        return view('visitor.create', compact('newKode', 'departments'));
    }

    public function store(VisitorRequest $request)
    {
        // Mendapatkan data yang sudah divalidasi dari request
        $data = $request->validated();
        $data['check_in_time'] = Carbon::now();
        $data['status'] = 1;
        // Menyimpan data ke dalam database
        Visitor::create($data);

        return redirect()->route('visitors.index')->with('success', 'Data pengunjung berhasil disimpan');
    }

    public function edit($id)
    {
        $visitor = Visitor::find($id); // Ganti dengan cara Anda mengambil data tamu dari database
        $departments = Department::pluck('name', 'id'); // Ganti dengan daftar departemen yang sesuai

        return view('visitor.edit', compact('visitor', 'departments'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim oleh pengguna
        $validatedData = $request->validate([
            'no_visitors' => 'required|string|max:255',
            'guest_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'type' => 'required|in:guest,visitor',
            'department_id' => 'required|exists:departments,id',
            'office_institution_name' => 'required|string|max:255',
            'number_of_people' => 'required|integer|min:1',
            'purpose' => 'required|string',
        ]);

        // Mengambil data tamu berdasarkan ID
        $visitor = Visitor::find($id);

        // Jika data tamu tidak ditemukan, redirect ke halaman sebelumnya
        if (!$visitor) {
            return redirect()->back()->with('error', 'Data tamu tidak ditemukan');
        }

        // Memperbarui data tamu dengan data yang baru
        $visitor->update($validatedData);

        // Redirect ke halaman tampilan data tamu dengan pesan sukses
        return redirect()->route('visitors.index', $visitor->id)->with('success', 'Data tamu berhasil diperbarui');
    }


    public function show($id)
    {

        $visitor = Visitor::find($id);


        if (!$visitor) {
            return redirect()->back()->with('error', 'Data tamu tidak ditemukan');
        }


        $departments = Department::pluck('name', 'id');

        return view('visitor.show', compact('visitor', 'departments'));
    }
}
