<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class PostController extends Controller
{
    public function index()
    {
        return   view('admin.index');
    }
    public function show($slug)
    {
        $posts = post::all();

        // $post = Post::where('slug' , $slug)->with('comment')->first();
        $post = Post::where('slug', $slug)
            ->with(['comments'])
            ->first();

            $comments = $post->comments()->paginate(6); // 5 comments per page
        if (!$post) {
            abort(403);
        }
        return view('Post.show', compact('post', 'comments' ));
    }

    public function edit($slug)
    {
        $posts = post::all();
        $post = post::where('slug', $slug)->first();



        return view('Post.edit', compact('post'));
    }

    public function store()
    {

        // $post = Arr::first($posts, fn($posts) => $posts['slug'] === $slug);

        $validated = request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:3'],
        ]);

        // dd(Auth::user()->id);
        post::create(
            [
                'title' => $validated['title'],
                'content' => $validated['content'],
                'slug' => $validated['title'],
                'user_id' => Auth::id(),
            ]
        );

        return redirect()->route('home')->with('success', 'postcreated successfully');
    }

    public function update($slug)
    {
        $posts = post::all();

        $post = Arr::first($posts, fn($posts) => $posts['slug'] === $slug);
        $validated =  request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:3'],
            'slug' => ['required', 'min:3']
        ]);


        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'slug' => $validated['slug'],
        ]);

        // return redirect()->route('login')->with('error', 'invalid cridentials');
        return redirect()->route('home')->with('success', 'Post edited successfully');
    }

    public function destory($slug)
    {
        $posts = post::all();
        $post = Arr::first($posts, fn($posts) => $posts['slug'] === $slug);

        $post->delete();

        return redirect()->route('home')->with('success', 'post deleted successfuly');
    }
}
