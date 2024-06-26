<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\BinGroupsController;
use App\Http\Controllers\BinsController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LessorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\checkAdminRole;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ChartController::class, 'barChart'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/token', function () {
    return csrf_token(); 
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('bins', BinsController::class);
    Route::resource('users', UsersController::class)->middleware(checkAdminRole::class);
    Route::resource('admins', AdminsController::class)->middleware(checkAdminRole::class);
    Route::resource('binGroups', BinGroupsController::class);
    Route::resource('lessors', LessorsController::class);
    // Route::get('/dashboard', [ChartController::class, 'barChart']);
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
