<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;

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


Route::get('/external-login', [ApiLoginController::class, 'showLoginForm'])->name('external.login');
Route::post('/external-login', [ApiLoginController::class, 'login']);
Route::post('/external-logout', [ApiLoginController::class, 'logout'])->name('external.logout');

Route::prefix('jobseeker')->group(function () {
    Route::get('/dashboard', [ApiLoginController::class, 'dashboard'])->name('jobseeker.dashboard');
});
