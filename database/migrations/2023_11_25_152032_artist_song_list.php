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
        Schema::create('artist_song_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('song_id');
            $table->unsignedBigInteger('artist_id');

            $table->timestamps();
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade')->after('id');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade')->after('id');
           
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
