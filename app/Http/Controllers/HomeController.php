<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.index');
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
        $activeTab='songs';
        return view('users.songs',compact('activeTab','songs'));
    }
    public function userAddSongsView()
    {   
        $activeTab='songs';
        return view('users.addNewSong',compact('activeTab'));
    }
    public function userAddPlaylistsView()
    {   
        $activeTab='playlist';
        $listsong=song::all();
  
        return view('users.addNewPlaylist',compact('activeTab','listsong'));
    }
    public function adminView()
    {   
        // $activeTab='playlist';
        // $listsong=song::all();
        // dd("hello");
        return view('admin.dashboard');
    }
}
