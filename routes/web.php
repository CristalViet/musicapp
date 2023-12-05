<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaylistController;

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

//song playlist
Route::get('/songs/{song}', [SongController::class,'index'])->name('song');
Route::get('/playlists/{playlist}', [SongController::class, 'runPlaylist'])->name('run_playlist');


Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'adminView'])->name('admin.dashboard');
        // Thêm các route khác tại đây nếu cần
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/show2', [SongController::class, 'show2'])->name('show2');
Route::group(['prefix'=>'user'], function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashBoardview'])->name('userDashBoard');
    Route::get('/setting', [App\Http\Controllers\HomeController::class, 'settingView'])->name('userSetting');
    // Route::put('/setting', [App\Http\Controllers\HomeController::class, 'settingView'])->name('user');
    
    
    //Playlist 
    Route::get('/userplaylist', [PlaylistController::class, 'index'])->name('userPlaylists');
    Route::get('/addPlaylist', [HomeController::class, 'userAddPlaylistsView'])->name('addPlaylist');
    Route::post('/addPlaylist', [PlaylistController::class, 'store'])->name('storePlaylist');
    Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('destroyPlaylist');
    Route::get('/userplaylist/{playlist}', [SongController::class, 'playlist'])->name('detailPlaylist');
    //song
    Route::get('/userSongs', [HomeController::class, 'userSongsView'])->name('userSongs');
    Route::get('/addSong', [HomeController::class, 'userAddSongsView'])->name('addSong');
    Route::post('/addSong', [SongController::class, 'store'])->name('storeSong');
    Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('destroySong');
    Route::put('/change', [UserController::class, 'update'])->name('changeInforUser');
    Route::get('/edit/{song}', [SongController::class, 'editForm'])->name('showInfoSong');
    Route::put('/edit/{song}', [SongController::class, 'update'])->name('updateSong');
    
Route::PUT('/setting', [UserController::class,'updateAvatar'])->name('update-avatar');
});

// Route::post('/user/setting', [UserController::class,'updateAvatar'])->name('update-avatar');






