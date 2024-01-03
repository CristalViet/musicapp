<?php

namespace App\Http\Controllers;


use App\Models\song;
use App\Models\User;
use App\Models\playlist;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index($id){
        $song=song::find($id);
        $author=User::find($song->user_id)->name;
 
        return view('songs.song',[
             'song'=>$song,
             'author'=>$author
        ]);
    }

    public function playlist(String $id){
        $playlist=playlist::find($id);
        $songs=DB::table('song_playlists')->join('songs','song_playlists.song_id','=','songs.id')
        ->join('playlists','song_playlists.playlist_id','=','playlists.id')
        ->where('song_playlists.playlist_id','=',$id)->select('songs.*')->get();
    //   dd($songs);   
        return view('playlists.song',[
             'songs'=>$songs,
             'playlist'=>$playlist
        ]);
    }
    public function runPlaylist(String $id){
        $playlist=playlist::find($id);
        $author=User::find($playlist->user_id)->name;
        $songs=DB::table('song_playlists')->join('songs','song_playlists.song_id','=','songs.id')
        ->join('playlists','song_playlists.playlist_id','=','playlists.id')
        ->where('song_playlists.playlist_id','=',$id)->select('songs.*')->get();
    //   dd($songs);   
        return view('playlists.run_Playlist',[
             'songs'=>$songs,
             'playlist'=>$playlist,
             'author'=>$author
        ]);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'nameSong'=>'required|string|max:255',
            'description'=>'nullable|string',
            'music_file'=>'file|mimes:mp3,wav',
            'song_img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $song=new song();
        // dd($data['gender']);
        $song_img='';
        $song_url= $request['music_file']->store('songs','public');
        if($request['song_img']!=null){
            $song_img=$request['song_img']->store('songImgs','public');
        }

        $song= song::create([
            'title' => $request['nameSong'],
            'description' => $request['email'],
            'user_id' => intval(auth()->user()->id),
            'song_url' => $song_url,
            'song_img'=> $song_img,
        ]);
       return redirect()->route('userSongs');
    }
    public function destroy( $songId){
        $song=song::find($songId);
        //kiểm tra xem role phải admin ko
        if(auth()->user()->role==1){
            if(auth()->user()->id==$song->userid){
                $filePath=$song->song_url;
                if ($filePath && Storage::disk('public')->exists($filePath)) {
            
                    $song->delete();
                    Storage::disk('public')->delete($filePath);
                }
            }
            return redirect(route('userSongs'));
            
        }
        else {
            $filePath=$song->song_url;
                if ($filePath && Storage::disk('public')->exists($filePath)) {
            
                    $song->delete();
                    Storage::disk('public')->delete($filePath);
                }
                    return redirect(route('manageSongs'));
        }
      
        
        
   
    }
    public function editForm( $songId){
        $song=song::find($songId);
       
        return view('songs.edit',['song'=>$song]);
    }
    public function update( Request $request,song $song){
        $formfield=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'music_file'=>'file|mimes:mp3,wav',
            'song_img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->hasFile('music_file')){
            $song->song_url= $request['music_file']->store('songs','public');
        }
        
        $song->update($formfield);
        return redirect(route('userSongs'));
    }
    public function show2(Request $request)
    {
        return view('songs.baihatmoi', [
            'playlist' => ["https://dl.dropbox.com/s/oswkgcw749xc8xs/The-Noisy-Freaks.mp3?dl=1", "https://dl.dropbox.com/s/75jpngrgnavyu7f/The-Noisy-Freaks.ogg?dl=1", "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3"]
        ]);
    }
    public function favouriteSong(){
        $user=auth()->user();
        $songsFavourite=DB::table('likes')->where('user_id',$user->id);
        $songs=DB::table('songs')->join('likes','songs.id','=','likes.song_id')->select('songs.*')->get();
        // dd($songs);
        return view('users.userFavouriteSongs',['songs'=>$songs]);
    }
    public function UnFavouriteSong(String $id){
        $user=auth()->user();
        $songsFavourite=DB::table('likes')->where('user_id',$user->id)->where('song_id','=',$id)->delete();
        // $songs=DB::table('songs')->join('likes','songs.id','=','likes.song_id')->select('songs.*')->get();
        // dd($songs);
        return redirect()->route('favouriteSongs');
    }
    
}
