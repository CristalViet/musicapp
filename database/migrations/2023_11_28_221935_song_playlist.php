<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('song_playlist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('playlist_id');
            $table->unsignedBigInteger('song_id');
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade')->after('id');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade')->after('id');
            $table->timestamps();
            
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
