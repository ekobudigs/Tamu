<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\NoteVisitorController;
use App\Http\Controllers\VisitorSurveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('visitors', VisitorController::class);

    Route::get('visitors/{id}/survey', [VisitorSurveyController::class, 'index'])->name('visitors.survey');
    Route::post('visitors/survey', [VisitorSurveyController::class, 'store'])->name('visitors.survey.store');

    // Route::get('visitors/{id}/survey', [VisitorSurveyController::class, 'index'])->name('visitors.survey');

    Route::get('note/{id}', [NoteVisitorController::class, 'index'])->name('note.index');
    Route::get('scan', [ScanController::class, 'index'])->name('scan.index');
    Route::get('getVisitor', [ScanController::class, 'getVisitor'])->name('getVisitor');
    Route::get('barcodeGenerate/{id}', [VisitorController::class, 'barcodeGenerate'])->name('visitors.barcodeGenerate');


    Route::post('/update-special-note', [NoteVisitorController::class, 'updateSpecialNote'])->name('update.special.note');
});

require __DIR__ . '/auth.php';
