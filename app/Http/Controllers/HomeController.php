<?php

namespace App\Http\Controllers;

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
    public function userPlaylist()
    {   
        $activeTab='playlist';
        return view('users.playlist',compact('activeTab'));
    }
    public function userSongsView()
    {   
        $activeTab='songs';
        return view('users.songs',compact('activeTab'));
    }
    public function userAddSongsView()
    {   
        $activeTab='songs';
        return view('users.addNewSong',compact('activeTab'));
    }
}
