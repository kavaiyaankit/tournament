<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;

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

Route::get('/', [TournamentController::class, 'showTeams'])->name('tournament.showTeams');
Route::post('/step1', [TournamentController::class, 'saveTeams'])->name('tournament.saveTeams');
Route::get('/step2', [TournamentController::class, 'stepTwoShow'])->name('tournament.stepTwo');
Route::post('/step2-save', [TournamentController::class, 'stepTwoSave'])->name('tournament.stepTwoSave');
Route::get('/step3', [TournamentController::class, 'stepThreeShow'])->name('tournament.stepThree');
Route::post('/step3-save', [TournamentController::class, 'stepThreeSave'])->name('tournament.stepThreeSave');
Route::get('/step4', [TournamentController::class, 'stepFourShow'])->name('tournament.stepFour');
Route::post('/step4-save', [TournamentController::class, 'stepFourSave'])->name('tournament.stepFourSave');
Route::get('/step5', [TournamentController::class, 'stepFiveShow'])->name('tournament.stepFive');

