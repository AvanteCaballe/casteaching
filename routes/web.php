<?php

use App\Http\Controllers\VideoManageController;
use App\Http\Controllers\VideosController;
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
    return view('welcome');
});

Route::get('/videos/{id}', [ VideosController::class, 'show']);


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/manage/videos', [ VideoManageController::class, 'index'])
        ->middleware(['can:videos_manage_index'])
        ->name('manage.videos');
    Route::post('/manage/videos',[ VideoManageController::class,'store' ]);
    Route::delete('/manage/videos/{id}',[ VideoManageController::class,'destroy' ])
        ->middleware(['can:videos_manage_destroy']);
    Route::get('/manage/users', [ \App\Http\Controllers\UsersManageController::class,'index'])
        ->middleware(['can:users_manage_index'])
        ->name('manage.users');
});
