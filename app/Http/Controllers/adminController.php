<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\song;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    
    public function adminView()
    {   
        // $activeTab='playlist';
        // $listsong=song::all();
        // dd("hello");
        $NumberAccounts=User::all()->count();
        $NumberSongs=song::all()->count();
        // dd($NumberAccount);
        return view('admin.dashboard',[
            'numberAccounts'=>$NumberAccounts,
            'numberSongs'=>$NumberSongs,
        ]);
    }
    public function manageUsersView()
    {   
        // $activeTab='playlist';
        // $listsong=song::all();
        // dd("hello");
        $NumberAccounts=User::all()->count();
        $NumberSongs=song::all()->count();
        $listUser=User::all();
        // dd($NumberAccount);
        return view('admin.manageUsers',[
            'numberAccounts'=>$NumberAccounts,
            'numberSongs'=>$NumberSongs,
            'listUser'=>$listUser,
        ]);
    }
    public function manageSongsView()
    {   
        // $activeTab='playlist';
        // $listsong=song::all();
        // dd("hello");
     
        $NumberSongs=song::all()->count();
        $songs=song::all();
        // dd($NumberAccount);
        return view('admin.manageSongs',[
          
            'numberSongs'=>$NumberSongs,
            'songs'=>$songs

        ]);
    }
    public function manageAddSongsView(){
        $genres=genre::all();
        return view('admin.addSong',['genres'=>$genres]);
    }
    public function manageGenresView()
    {   
        // $activeTab='playlist';
        // $listsong=song::all();
        // dd("hello");
     
        $NumberSongs=genre::all()->count();
        $genres=genre::all();
        // dd($NumberAccount);
        return view('admin.manageGenres',[
          
            'numberGenres'=>$NumberSongs,
            'genres'=>$genres

        ]);
    }
}
