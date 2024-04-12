<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;

class MusicController extends Controller
{
    public function music() {
        $music = Music::all();
        dd($music);
        return view('pages.music', [
            'musicList' => $music
        ]);
    }

}
