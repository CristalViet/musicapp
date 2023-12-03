<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'user_id',
        'playlist_img',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function song_playlist()
    {
        return $this->hasMany(song_playlist::class);
    }
 
}
