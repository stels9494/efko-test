<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacationController;

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

Route::group(['middleware' => ['auth', 'role:leader|employer']], function () {
	// Route::view('/dashboard', 'dashboard')->name('dashboard');
	Route::get('/', [VacationController::class, 'index'])->name('vacations.index');

	Route::group(['middleware' => ['role:employer'], 'as' => 'vacations.'], function () {
		Route::get('/create', [VacationController::class, 'create'])->name('create');
		Route::post('/', [VacationController::class, 'store'])->name('store');
		Route::group(['middleware' => ['personal_data', 'check_fix']], function () {
			Route::get('/{vacation}/edit', [VacationController::class, 'edit'])->name('edit');
			Route::delete('/{vacation}', [VacationController::class, 'destroy'])->name('destroy');
			Route::patch('/{vacation}', [VacationController::class, 'update'])->name('update');
		});
	});

	Route::group(['middleware' => ['role:leader']], function () {
		Route::post('/{vacation}/fix-vacation', [VacationController::class, 'fixVacation'])->name('vacations.fix-vacation');
	});
});

require __DIR__.'/auth.php';
