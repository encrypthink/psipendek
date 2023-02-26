<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamineeController;
use App\Http\Controllers\ExamResultsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/sheet/{id}', [DashboardController::class, 'sheet'])->name('sheet');
    Route::post('/sheet/{id}', [DashboardController::class, 'submitAnswer'])->name('answer');
    Route::resource('/users', UsersController::class);
    Route::resource('/exam', ExamController::class);
    Route::resource('/question', QuestionController::class);
    Route::resource('/examinee', ExamineeController::class);
    Route::resource('/results', ExamResultsController::class);
});

require __DIR__.'/auth.php';
