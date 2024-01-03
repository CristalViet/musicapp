<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addGenre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField=$request->validate([
            'title'=>['string','required',Rule::unique('genres','title')],
        ]);
        $genre=genre::create($formField);
        return redirect()->route('admin.manageGenres');
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
