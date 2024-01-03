<?php

namespace App\Http\Controllers;

use App\Models\artist;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

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
            'gender'=>'string',
            'description'=>'nullable|string',
            'website'=>'nullable|string',
            'artist_img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
    
        // dd($data['gender']);
        $artist_img='';
    
        if($request->hasFile('artist_img')){
            $artist_img=$request->file('artist_img')->store('avatars','public');
        }

        $artist= artist::create([
            'name' => $formField['name'],
            'description' => $formField['description'],
            'gender'=>$formField['gender'],
            'website' => $formField['website'],
            'artist_img' =>$artist_img
        ]);
       return redirect()->route('admin.manageArtists');
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
    public function searchArtist(Request $request){
        $query = $request->input('query');
        if ($query) {
            $artists = Artist::where('name', 'like', '%' . $query . '%')->get();
            
            return response()->json(['artists' => $artists]);
        }

        return response()->json(['artists' => []]);

    }
}
