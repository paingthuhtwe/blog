<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create()
    {
        $validator = validator(request()->all(), [
            'content' => 'required',
            'article_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $comment = new Comment();
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->save();

        return back()->with('info', 'A comment Added!');
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return back()->with('info', 'A comment Deleted!');
    }
}
