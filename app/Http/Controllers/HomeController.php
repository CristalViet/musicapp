<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\playlist;
use App\Models\song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $baihatmois = Song::latest('created_at')->take(4)->get();
        $playlistmois = Playlist::latest('created_at')->take(4)->get();

        $topSongs = Song::select('songs.id', 'songs.title', 'songs.song_img', DB::raw('COUNT(likes.id) AS like_count'), DB::raw('GROUP_CONCAT(artists.name SEPARATOR ", ") AS artist_name'))
            ->join('likes', 'songs.id', '=', 'likes.song_id')
            ->leftJoin('artist_song_list', 'songs.id', '=', 'artist_song_list.song_id')
            ->leftJoin('artists', 'artist_song_list.artist_id', '=', 'artists.id')
            ->groupBy('songs.id', 'songs.title', 'songs.song_img')
            ->orderByDesc('like_count')
            ->limit(5)
            ->get();

        return view('users.index', [
            'baihatmois' => $baihatmois,
            'playlistmois' => $playlistmois,
            'topSongs' => $topSongs,
        ]);
    }
    public function dashBoardView()
    {
        $activeTab = 'home';
        return view('users.userDashBoard', compact('activeTab'));
    }
    public function settingView()
    {
        $activeTab = 'home';
        return view('users.userSetting', compact('activeTab'));
    }

    public function userSongsView()
    {
        $songs = auth()->user()->songs;

        $genres = genre::all();

        $activeTab = 'songs';
        return view('users.songs', compact('activeTab', 'songs', 'genres'));
    }
    public function userAddSongsView()
    {
        $activeTab = 'songs';
        $genres = genre::all();
        return view('users.addNewSong', compact('activeTab', 'genres'));
    }
    public function userAddPlaylistsView()
    {
        $activeTab = 'playlist';
        $listsong = song::all();

        return view('users.addNewPlaylist', compact('activeTab', 'listsong'));
    }
}
