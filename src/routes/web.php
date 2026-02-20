<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;
use App\Http\Controllers\InitialWeightController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;


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

Route::middleware('auth')->group(function () {
    Route::get('/initial-weight', [InitialWeightController::class, 'create'])
        ->name('initial-weight.create');

    Route::post('/initial-weight', [InitialWeightController::class, 'store'])
        ->name('initial-weight.store');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// ログイン画面
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ログイン必須
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | 管理画面（US004）
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [WeightLogController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | 検索（FN017）
    |--------------------------------------------------------------------------
    */

    Route::get('/search', [WeightLogController::class, 'search'])
        ->name('weight_logs.search');

    /*
    |--------------------------------------------------------------------------
    | 体重登録（US006）
    |--------------------------------------------------------------------------
    */

    Route::get('/weight-logs/create', [WeightLogController::class, 'create'])
        ->name('weight_logs.create');

    Route::post('/weight-logs', [WeightLogController::class, 'store'])
        ->name('weight_logs.store');

    /*
    |--------------------------------------------------------------------------
    | 編集（US007）
    |--------------------------------------------------------------------------
    */

    Route::get('/weight-logs/{weightLog}/edit', [WeightLogController::class, 'edit'])
        ->name('weight_logs.edit');

    Route::put('/weight-logs/{weightLog}', [WeightLogController::class, 'update'])
        ->name('weight_logs.update');

    Route::delete('/weight-logs/{weightLog}', [WeightLogController::class, 'destroy'])
        ->name('weight_logs.destroy');

    /*
    |--------------------------------------------------------------------------
    | 目標体重変更（US008）
    |--------------------------------------------------------------------------
    */

    Route::get('/weight_target/edit', [WeightTargetController::class, 'edit'])
    ->name('target.edit');

    Route::post('/weight_target/update', [WeightTargetController::class, 'update'])
    ->name('target.update');
});