<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class song extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'user_id',
        'song_url',
        'song_img'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
