<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function index()
    {
        $views = DB::table('views')
            ->join('songs', 'views.song_id', '=', 'songs.id')
            ->select('views.*', 'songs.*')
            ->where('views.user_id', Auth()->user()->id)
            ->orderBy('views.created_at', 'desc')
            ->get();
        return view('users.userHistory', ['songs' => $views]);
    }
}
