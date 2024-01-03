<?php

use App\Models\genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SearchController;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('users.index');
// });
Route::get('/',[HomeController::class,'index'])->name('indexhome');

//song playlist
Route::get('/songs/{song}', [SongController::class,'index'])->name('song');

Route::get('/playlists/{playlist}', [SongController::class, 'runPlaylist'])->name('run_playlist');
Route::get('/search/', [SearchController::class,'search'])->name('search');


Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [adminController::class, 'adminView'])->name('admin.dashboard');
        // Thêm các route khác tại đây nếu cần
        Route::get('/manage/users', [adminController::class, 'manageUsersView'])->name('admin.manageUsers');
        Route::delete('/manage/users/{user}', [UserController::class, 'destroy'])->name('destroyUser');
        Route::get('/manage/users/{user}', [UserController::class, 'editView'])->name('editUser');

        Route::put('/manage/users/{user}', [UserController::class, 'edit'])->name('updateUser');

        // quan li bai hat
        Route::get('manage/songs',[adminController::class,'manageSongsView'])->name('admin.manageSongs');
        Route::get('manage/addSongs',[adminController::class,'manageAddSongsView'])->name('admin.addSongs');
        Route::delete('manage/songs/{song}',[SongController::class,'destroy'])->name('admin.manageDeleteSongs');
        // Route::put('/manage/users/{user}', [SongController::class, 'edit'])->name('updateUser');
        // quan li genres
        Route::get('manage/genres/add',[GenreController::class,'create'])->name('admin.addGenre');
        Route::post('manage/genres/add',[GenreController::class,'store'])->name('admin.storeGenre');
        Route::get('manage/genres',[adminController::class,'manageGenresView'])->name('admin.manageGenres');
   
        //quan li nghe si
        Route::get('manage/artists/add',[ArtistController::class,'create'])->name('admin.addArtist');
        Route::post('manage/artists/add',[ArtistController::class,'store'])->name('admin.storeArtist');
        Route::get('manage/artists',[ArtistController::class,'index'])->name('admin.manageArtists');
    });
});
Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/show2', [SongController::class, 'show2'])->name('show2');
Route::post('/yeuthich/{song}',[UserController::class,'addFavouriteSong'])->name('addFavouriteSong');
Route::group(['prefix'=>'user'], function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashBoardview'])->name('userDashBoard');
    Route::get('/setting', [App\Http\Controllers\HomeController::class, 'settingView'])->name('userSetting');
    Route::put('/setting', [App\Http\Controllers\HomeController::class, 'settingView'])->name('settingView');
    
    
    //Playlist 
    Route::get('/userplaylist', [PlaylistController::class, 'index'])->name('userPlaylists');
    Route::get('/addPlaylist', [HomeController::class, 'userAddPlaylistsView'])->name('addPlaylist');
    Route::post('/addPlaylist', [PlaylistController::class, 'store'])->name('storePlaylist');
    Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('destroyPlaylist');
    Route::get('/userplaylist/{playlist}', [SongController::class, 'playlist'])->name('detailPlaylist');
    Route::get('/editPlaylist', [PlaylistController::class, 'edit'])->name('editPLaylistView');
    //song
    Route::get('/userSongs', [HomeController::class, 'userSongsView'])->name('userSongs');
    Route::get('/addSong', [HomeController::class, 'userAddSongsView'])->name('addSong');
    Route::post('/searchArtist', [ArtistController::class, 'searchArtist'])->name('searchArtist');

    Route::post('/addSong', [SongController::class, 'store'])->name('storeSong');
    Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('destroySong');
    Route::put('/change', [UserController::class, 'update'])->name('changeInforUser');
    Route::get('/edit/{song}', [SongController::class, 'editForm'])->name('showInfoSong');
    Route::put('/edit/{song}', [SongController::class, 'update'])->name('updateSong');
    Route::get('favourite/songs',[SongController::class,'favouriteSong'])->name('favouriteSongs');
    Route::delete('favourite/songs/{song}',[SongController::class,'UnFavouriteSong'])->name('UnFavouriteSong');

Route::put('/setting', [UserController::class,'updateAvatar'])->name('update-avatar');
});

// Route::post('/user/setting', [UserController::class,'updateAvatar'])->name('update-avatar');






