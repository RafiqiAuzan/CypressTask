<?php


namespace App\Http\Controllers;
use App\Http\Controllers\JournalController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [JournalController::class, 'index'])->name('journals.index');
Route::post('journals', [JournalController::class, 'store'])->name('journals.store');
Route::delete('/journals/{id}', [JournalController::class, 'destroy'])->name('journals.destroy');

// Route::get('/',  function () {
//     return view('JournalList');
// });

Route::get('/journal-add', function () {
    return view('JournalAdd');
});

Route::get('/journal-detail', function () {
    return view('JournalDetail');
});

Route::get('/journal-edit', function () {
    return view('JournalEdit');
});
