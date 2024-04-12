<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function posts() {
        $posts = Post::with('user.userRoles.role')->get();
        $userRole = Auth::user()->userRoles()->first()->role->name;



        return view('pages.posts', [
            'posts' => $posts,
            'user_role' => $userRole
        ]);
    }

    public function postCreate(Request $request) {
        Post::create([
            ...$request->except(['_token']),
            'user_id' => Auth::id()
        ]);
    }

    public function postEdit(Request $request, int $id) {

        $post = Post::find($id);
        $post->update(
            $request->except(['_token']),
        );

        return redirect()->route('post.list');
    }
    public function postEditShow(int $id)
    {
        $post = Post::find($id);

        return view('pages.edit', ['post'=> $post]);
    }

    public function postDelete(int $id)
    {

        $post = Post::find($id);
        if ($post->user_id !== auth()->id() && Auth::user()->userRoles()->first()->role->name != "Admin") {
            abort(403);
        }
        $post->delete();

        return redirect()->route('post.list');
    }
}
