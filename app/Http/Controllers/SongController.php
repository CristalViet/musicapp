<?php

namespace App\Http\Controllers;

use App\Models\artist;
use App\Models\genre;
use App\Models\song;
use App\Models\User;
use App\Models\playlist;
use App\Models\View;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index($id)
    {
        $song = song::find($id);
        $author = User::find($song->user_id)->name;
        if (Auth::check() && auth()->user()) {
            $userId = Auth::id();

            // Check if the view entry already exists for the current user and song
            DB::table('views')
                ->where('user_id', $userId)
                ->where('song_id', $id)
                ->delete();
            $view = new View();
            $view->song_id = $id;
            $view->user_id = $userId;
            $view->save();
        }
        return view('songs.song', [
            'song' => $song,
            'author' => $author
        ]);
    }

    public function playlist($id)
    {
        $playlist = playlist::find($id);
        $songs = DB::table('song_playlists')->join('songs', 'song_playlists.song_id', '=', 'songs.id')
            ->join('playlists', 'song_playlists.playlist_id', '=', 'playlists.id')
            ->where('song_playlists.playlist_id', '=', $id)->select('songs.*')->get();
        //   dd($songs);   
        return view('playlists.song', [
            'songs' => $songs,
            'playlist' => $playlist
        ]);
    }
    public function runPlaylist(String $id)
    {
        $playlist = playlist::find($id);
        $author = User::find($playlist->user_id)->name;
        $songs = DB::table('song_playlists')->join('songs', 'song_playlists.song_id', '=', 'songs.id')
            ->join('playlists', 'song_playlists.playlist_id', '=', 'playlists.id')
            ->where('song_playlists.playlist_id', '=', $id)->select('songs.*')->get();
        //   dd($songs);   
        return view('playlists.run_Playlist', [
            'songs' => $songs,
            'playlist' => $playlist,
            'author' => $author
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameSong' => 'required|string|max:255',
            'description' => 'nullable|string',
            'artist_ids' => 'required',
            'genre' => 'required',
            'music_file' => 'file|mimes:mp3,wav',
            'song_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Create the song
        $song = new Song();
        $song->title = $request->input('nameSong');
        $song->description = $request->input('description');
        $song->user_id = auth()->user()->id;

        // Save the song
        $song->save();

        // Handle artist-song relationship
        $artistIds = explode(',', $request->input('artist_ids', []));
        foreach ($artistIds as $artistId) {
            DB::table('artist_song_list')->insert([
                'song_id' => $song->id,
                'artist_id' => $artistId,
            ]);
        }

        // Handle genre-song relationship
        $genreId = $request->input('genre', null);
        DB::table('genre_song_list')->insert([
            'song_id' => $song->id,
            'genre_id' => $genreId,
        ]);

        // Handle music file and song image
        if ($request->hasFile('music_file')) {
            $musicFile = $request->file('music_file');
            $song->song_url = $musicFile->store('songs', 'public');
        }

        if ($request->hasFile('song_img')) {
            $songImgFile = $request->file('song_img');
            $songImgPath = $songImgFile->store('song_images', 'public');
            $song->song_img = $songImgPath;
        }

        // Save the song again with updated fields
        $song->save();

        return redirect()->route('userSongs');
    }
    public function destroy($songId)
    {
        $song = song::find($songId);
        //kiểm tra xem role phải admin ko
        if (auth()->user()->role == 1) {
            if (auth()->user()->id == $song->user_id) {
                $filePath = $song->song_url;
                if ($filePath && Storage::disk('public')->exists($filePath)) {

                    $song->delete();
                    Storage::disk('public')->delete($filePath);
                }
            }
            return redirect(route('userSongs'));
        } else {
            $filePath = $song->song_url;
            if ($filePath && Storage::disk('public')->exists($filePath)) {

                $song->delete();
                Storage::disk('public')->delete($filePath);
            }
            return redirect(route('manageSongs'));
        }
    }
    public function editForm($songId)
    {
        $song = song::find($songId);
        $genres = genre::all();
        $artists = artist::join('artist_song_list', 'artists.id', '=', 'artist_song_list.artist_id')
            ->where('artist_song_list.song_id', $songId)
            ->select('artists.id as id', 'artists.*')
            ->get();
           
        $song_genre = DB::table('genre_song_list')
            ->where('song_id', $songId)
            ->first();
        
        return view('songs.edit', ['song' => $song, 'genres' => $genres, 'song_genre' => $song_genre])->with('artists', json_encode($artists));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nameSong' => 'required|string|max:255',
            'description' => 'nullable|string',
            'song_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'artist_ids' => 'required',
            'genre' => 'required',
            'music_file' => 'nullable|file|mimes:mp3,wav',
        ]);

        // Find the song to update
        $song = Song::findOrFail($id);
        $song->title = $request->input('nameSong');
        $song->description = $request->input('description');

        // Handle artist-song relationship
        $artistIds = explode(',', $request->input('artist_ids', []));
        DB::table('artist_song_list')->where('song_id', $song->id)->delete();
        foreach ($artistIds as $artistId) {
            DB::table('artist_song_list')->insert([
                'song_id' => $song->id,
                'artist_id' => $artistId,
            ]);
        }

        // Handle genre-song relationship
        $genreId = $request->input('genre', null);
        DB::table('genre_song_list')->where('song_id', $song->id)->delete();
        DB::table('genre_song_list')->insert([
            'song_id' => $song->id,
            'genre_id' => $genreId,
        ]);

        // Handle music file and song image
        if ($request->hasFile('music_file')) {
            $musicFile = $request->file('music_file');
            $song->song_url = $musicFile->store('songs', 'public');
        }

        if ($request->hasFile('song_img')) {
            $songImgFile = $request->file('song_img');
            $songImgPath = $songImgFile->store('song_images', 'public');
            $song->song_img = $songImgPath;
        }

        // Save the updated song
        $song->save();

        return redirect()->route('userSongs');
    }
    public function show2(Request $request)
    {
        return view('songs.baihatmoi', [
            'playlist' => ["https://dl.dropbox.com/s/oswkgcw749xc8xs/The-Noisy-Freaks.mp3?dl=1", "https://dl.dropbox.com/s/75jpngrgnavyu7f/The-Noisy-Freaks.ogg?dl=1", "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3"]
        ]);
    }
    public function favouriteSong()
    {
        $user = auth()->user();
        $songsFavourite = DB::table('likes')->where('user_id', $user->id);
        $songs = DB::table('songs')->join('likes', 'songs.id', '=', 'likes.song_id')->select('songs.*')->get();
        // dd($songs);
        return view('users.userFavouriteSongs', ['songs' => $songs]);
    }
    public function UnFavouriteSong(String $id)
    {
        $user = auth()->user();
        $songsFavourite = DB::table('likes')->where('user_id', $user->id)->where('song_id', '=', $id)->delete();
        // $songs=DB::table('songs')->join('likes','songs.id','=','likes.song_id')->select('songs.*')->get();
        // dd($songs);
        return redirect()->route('favouriteSongs');
    }


    public function searchSong(Request $request){

        $query = $request->input('query');
        if ($query) {
            $songs = Song::where('title', 'like', '%' . $query . '%')->get();
            
            return response()->json(['songs' => $songs]);
        }

        return response()->json(['songs' => []]);

    }
    

}
