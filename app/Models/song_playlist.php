<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class song_playlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'playlist_id',
        'song_id',
        'user_id',
    
    ];
}
