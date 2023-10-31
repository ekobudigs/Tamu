<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect('/users');
        } else {
            return response()->json([
                'message' => 'Gagal menghapus user.',
            ], 500);
        }
    }
}
