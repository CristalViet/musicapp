<?php

namespace App\Http\Controllers;

use App\Models\playlist;
use App\Models\song;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('search');

    
    $songs = song::where('title', 'like', "%$query%")
                   
                   ->get();
                  
    $playlists=playlist::where('title', 'like', "%$query%")
 
    ->get();
    return view('search', ['songs' => $songs,'playlists'=>$playlists]);
}

}
