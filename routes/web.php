<?php

use App\Http\Controllers\GithubAuthController;
use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideoManageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageVueController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;
use GitHub\Sponsors\Client;

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

Route::get('/', [ LandingPageController::class,'show']);

Route::get('/videos/{id}', [ VideosController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/manage/videos', [ VideoManageController::class, 'index'])
        ->middleware(['can:videos_manage_index'])
        ->name('manage.videos');
    Route::post('/manage/videos',[ VideoManageController::class,'store' ])
        ->middleware(['can:videos_manage_store']);
    Route::delete('/manage/videos/{id}',[ VideoManageController::class,'destroy' ])
        ->middleware(['can:videos_manage_destroy']);
    Route::get('/manage/videos/{id}',[ VideoManageController::class,'edit' ])
        ->middleware(['can:videos_manage_edit']);
    Route::put('/manage/videos/{id}',[ VideoManageController::class,'update' ])
        ->middleware(['can:videos_manage_update']);
    Route::get('/manage/users', [ UsersManageController::class,'index'])
        ->middleware(['can:users_manage_index'])
        ->name('manage.users');
    Route::post('/manage/users',[ UsersManageController::class,'store' ])
        ->middleware(['can:users_manage_store']);
    Route::get('/manage/users/{id}', [UsersManageController::class, 'edit'])
        ->middleware(['can:users_manage_edit']);
    Route::put('/manage/users/{id}', [UsersManageController::class, 'update'])
        ->middleware(['can:users_manage_update']);
    Route::delete('/manage/users/{id}',[ UsersManageController::class,'destroy' ])
        ->middleware(['can:users_manage_destroy']);

    Route::get('/vue/manage/videos', [ VideosManageVueController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.vue.videos');

    Route::post('/vue/manage/videos',[ VideosManageVueController::class,'store' ])->middleware(['can:videos_manage_store']);
    Route::delete('/vue/manage/videos/{id}',[ VideosManageVueController::class,'destroy' ])->middleware(['can:videos_manage_destroy']);
    Route::get('/vue/manage/videos/{id}',[ VideosManageVueController::class,'edit' ])->middleware(['can:videos_manage_edit']);
    Route::put('/vue/manage/videos/{id}',[ VideosManageVueController::class,'update' ])->middleware(['can:videos_manage_update']);

});

Route::get('/github_sponsors', function () {
    $client = app(Client::class);
    dump($sponsors = $client->login('acacha')->sponsors());
    foreach ($sponsors as $sponsor) {
        dump($sponsor['avatarUrl']); // The sponsor's GitHub avatar url...
        dump($sponsor['name']); // The sponsor's GitHub name...
    }

    dump($sponsors = $client->login('driesvints')->sponsors());
    foreach ($sponsors as $sponsor) {
        dump($sponsor);
    }
});

Route::get('/auth/redirect', [GithubAuthController::class,'redirect']);

Route::get('/auth/callback', [GithubAuthController::class,'callback']);

