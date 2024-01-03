<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\playlist;
use App\Models\song;
use Illuminate\Http\Request;

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
        $baihatmois=song::latest('created_at')->take(4)->get();
        $playlistmois=playlist::latest('created_at')->take(4)->get();
        return view('users.index',['baihatmois'=>$baihatmois,'playlistmois'=>$playlistmois]);
    }
    public function dashBoardView( )
    {   
        $activeTab='home';
        return view('users.userDashBoard',compact('activeTab'));
    }
    public function settingView( )
    {   
        $activeTab='home';
        return view('users.userSetting',compact('activeTab'));
    }
    // public function show2( )
    // {      
    //     $playlist=[];
  
    //     return view('songs.baihatmoi',['playlist'=>$pla]);
    // }
   
    public function userSongsView()
    {   
        $songs=auth()->user()->songs;
        
        $genres=genre::all();
        
        $activeTab='songs';
        return view('users.songs',compact('activeTab','songs','genres'));
    }
    public function userAddSongsView()
    {   
        $activeTab='songs';
        $genres=genre::all();
        return view('users.addNewSong',compact('activeTab','genres'));
    }
    public function userAddPlaylistsView()
    {   
        $activeTab='playlist';
        $listsong=song::all();
  
        return view('users.addNewPlaylist',compact('activeTab','listsong'));
    }
   
}
