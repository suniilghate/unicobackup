<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    //Storage::disk('google')->put('welcome.txt', 'Welcome to Backup process');
    return view('welcome');
});

Route::get('users/list', [UserController::class, 'getUsers'])->name('users.list');
Route::get('users/grades', [UserController::class, 'getUsersByGrades'])->name('users.grades');
//http://127.0.0.1:8000/users/grades/?gradeval=3,2
