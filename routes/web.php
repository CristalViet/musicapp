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
Route::get('/video', [SongController::class,'index'])->name('song');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/show2', [SongController::class, 'show2'])->name('show2');
Route::group(['prefix'=>'user'], function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashBoardview'])->name('userDashBoard');
    Route::get('/setting', [App\Http\Controllers\HomeController::class, 'settingView'])->name('userSetting');
    // Route::put('/setting', [App\Http\Controllers\HomeController::class, 'settingView'])->name('user');
    Route::get('/userplaylist', [App\Http\Controllers\HomeController::class, 'userPlaylist'])->name('userPlaylist');
    Route::get('/userSongs', [HomeController::class, 'userSongsView'])->name('userSongs');
    Route::get('/addSong', [HomeController::class, 'userAddSongsView'])->name('addSong');
    Route::get('/addPlaylist', [HomeController::class, 'userAddPlaylistsView'])->name('addPlaylist');
    Route::post('/addSong', [SongController::class, 'store'])->name('storeSong');
    Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('destroySong');
    Route::put('/change', [UserController::class, 'update'])->name('changeInforUser');
    Route::get('/edit/{song}', [SongController::class, 'editForm'])->name('showInfoSong');
    Route::put('/edit/{song}', [SongController::class, 'update'])->name('updateSong');
    
Route::PUT('/setting', [UserController::class,'updateAvatar'])->name('update-avatar');
});

// Route::post('/user/setting', [UserController::class,'updateAvatar'])->name('update-avatar');






