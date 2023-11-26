<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
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
    return view('users.index');
});
Route::get('/video', function () {
    return view('songs.video');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'user'], function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashBoardview'])->name('userDashBoard');
    Route::get('/setting', [App\Http\Controllers\HomeController::class, 'settingView'])->name('userSetting');
    Route::get('/userplaylist', [App\Http\Controllers\HomeController::class, 'userPlaylist'])->name('userPlaylist');
    Route::get('/userSongs', [HomeController::class, 'userSongsView'])->name('userSongs');
    Route::get('/addSong', [HomeController::class, 'userAddSongsView'])->name('addSong');
    Route::post('/addSong', [SongController::class, 'store'])->name('storeSong');
    Route::put('/change', [UserController::class, 'updateAvatar'])->name('changeInforUser');
Route::PUT('/setting', [UserController::class,'updateAvatar'])->name('update-avatar');
});

// Route::post('/user/setting', [UserController::class,'updateAvatar'])->name('update-avatar');






