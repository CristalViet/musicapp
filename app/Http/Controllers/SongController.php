<?php

namespace App\Http\Controllers;

use App\Models\song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    public function index(Request $request){
        return view('songs.video',[
             'song'=>song::find(1)
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
        $song->delete();
       return redirect(route('userSongs'));
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
}
