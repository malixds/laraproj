<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comments() {
        $comment = Comment::all();

        // $context = array('text' => $commentText);
        return view('pages.comments', [
            'comments' => Comment::all()
        ]);
    }
}
