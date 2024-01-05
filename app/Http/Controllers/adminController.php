<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\playlist;
use App\Models\song;
use App\Models\song_playlist;
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
    public function managePlaylistView(){
        $playlist = playlist::all();
        return view ('admin.managePlaylist', [
            "playlists" => $playlist,
            "countPlaylist" => playlist::count(),
        ]);
    }

    public function manageAddPlaylistView(){
        $playlists = playlist::all();
        $songs = song::all();
        return view ('admin.addPlaylist', [
            'playlists' => $playlists,
            'songs'=> $songs
        ]);
    }

    public function storePlaylist(Request $request){
        $formField= $request->validate([
            'title'=>'required|string|max:255',
            'user_id'=>'nullable|string',
            'description'=>'nullable|string',
            'playlist_img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $playlist_img='';

        if($request->hasFile('playlist_img')){
            $playlist_img=$request->file('playlist_img')->store('avatars','public');
        }

        $playlist= playlist::create([
            'title' => $formField['title'],
            'user_id' => $formField['user_id'],
            'description' => $formField['description'],
            'playlist_img' =>$playlist_img
        ]);
       return redirect()->route('admin.managePlaylist');
    }

    public function destroyPlaylist($playlist){
        $playlist=playlist::find($playlist);
        $playlist->delete();
        //kiểm tra xem role phải admin ko

            return redirect(route('admin.managePlaylist'));

        }

    public function editView($playlist_id){
        $playlist=playlist::find($playlist_id);

        return view('admin.editPlaylist', [
            'playlist' => $playlist,
        ]);
    }

    public function edit(Request $request,$id){

        if($request->password!=null){

            $formField=$request->validate([
                'title'=>'string',
                'user_id'=>'string',
                'gender'=>'integer',
                'password'=>'min:6',
                'avatarLink'=>'nullable|string'

            ]);
            $password=bcrypt($request->password) ;
            $formField['password']=$password;

        }

        else {
            $formField=$request->validate([
                'name'=>'string',
                'email'=>'email',
                'gender'=>'integer',

                'avatarLink'=>'nullable|string'

            ]);
        }


        $user=User::find($id);

        DB::table('users')
            ->where('id',$id)
            ->update($formField);

        return redirect(route('admin.manageUsers'));
    }   
}
