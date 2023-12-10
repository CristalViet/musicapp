<?php

namespace App\Http\Controllers;

use App\Models\artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists=artist::all();

        return view('admin.manageArtists',['artists'=>$artists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addArtist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField= $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'nullable|string',
            'website'=>'nullable|string',
            'artist_img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
    
        // dd($data['gender']);
        $artist_img='';
    
        if($request['artist_img']!=null){
            $artist_img=$formField['artist_img']->store('avatars','public');
        }

        $artist= artist::create([
            'name' => $formField['name'],
            'description' => $formField['email'],
            'website' => $formField['website'],
            'artist_img' =>$artist_img
        ]);
       return redirect()->route('userSongs');
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
    public function edit(string $id)
    {
        //
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
        //
    }
}
