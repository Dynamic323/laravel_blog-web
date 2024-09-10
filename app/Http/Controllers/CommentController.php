<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\post;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $m = post::find(1)->comment;
       

        $validated = $request->validate([
            'post_id' => ['required'],
            'content' => ['required', 'min:3'],
        ]);
        comments::create(
            [
                'post_id' => $validated['post_id'],
                'content' => $validated['content'],
                'user_id' => Auth::id(),
            ]
        );
        return redirect()->route('home')->with('success', 'commentsuccess');
    }
}
