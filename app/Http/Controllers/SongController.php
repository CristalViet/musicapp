<?php

namespace App\Http\Controllers;

use App\Models\song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    
    public function store(Request $request)
    {   
        $request->validate([
            'title'=>'require|string|,max:255',
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
}
