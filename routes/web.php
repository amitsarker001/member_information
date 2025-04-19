<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemberController;

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::middleware(['auth'])->group(function () {

    // Admin routes
    Route::middleware('can:admin-access')->group(function () {
        Route::resource('members', MemberController::class);
    });

// Home (redirect to member list)
    Route::get('/', function () {
        return redirect()->route('members.index');
    });

// List all members
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');

// Show form to create a new member
    Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');

// Store new member
    Route::post('/members', [MemberController::class, 'store'])->name('members.store');

// Show single member detail
    Route::get('/members/{member}', [MemberController::class, 'show'])->name('members.show');

// Show form to edit an existing member
    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');

// Update member
    Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');

// Delete member
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

// Show form to edit own member information
    Route::get('/my-info', [MemberController::class, 'myInfo'])->name('members.myinfo');

    Route::get('/download-pdf', [MemberController::class, 'downloadPDF'])->name('download.pdf');

});


