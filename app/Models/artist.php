<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'gender',
        'description',
        'website',
        'artist_img',
        
    ];
}
