<?php

namespace App\Http\Controllers;

use App\Models\song;
use App\Models\playlist;
use Illuminate\Http\Request;

use App\Models\song_playlist;
use function Laravel\Prompts\table;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
            $activeTab='playlist';
            $playlists=auth()->user()->playlists;
        
            return view('users.playlist',compact('activeTab','playlists'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        $playlist_Song=json_decode(request()->playlist_send) ;
        // dd($playlist_Song);
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
           
            'playlist_img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $playlist=new playlist();
        $playlist_img='';
        if(request()->hasFile('playlist_img')){
            $playlist_img= $request->file('playlist_img')->store('playlist_img','public');
        }
       
       

        $playlist= playlist::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => intval(auth()->user()->id),
            'playlist_img' => $playlist_img,
      
        ]);

        foreach ($playlist_Song as $song) {
            song_playlist::create([
                'playlist_id'=>$playlist->id,
                'song_id'=>$song->id
            ]);
            
        }
      
       return redirect()->route('userPlaylists');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {   
        $listsong=song::all();
        return view('users.editPlaylist',['listsong'=>$listsong]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playlist=playlist::find($id);
        
        $playlist->delete();
       
        return redirect()->route('userPlaylists');
    }
}
