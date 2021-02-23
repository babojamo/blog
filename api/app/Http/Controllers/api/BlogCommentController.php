<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Post;
use App\Models\Comment;

class BlogCommentController extends Controller
{
    public function create(Request $request,$post)
    {
        $request->validate([
            'body'     => 'required|string',
        ]);

        $post = Post::whereSlug($post)->first();

        if( !$post )
            return response()->json(['message'=>"No query results for model [App\\Models\\Post]."],404);

        $user = Auth::user();

        $comment = new Comment;

        $comment->body = $request->body;
        $comment->commentable_type = 'App\\Models\\Post';
        $comment->creator_id = $user->id;
        $comment->commentable_id = null;
        $comment->parent_id = $post->id;
        $comment->save();


        return response()->json([
            'data' => $comment
        ]);
    }

    public function update(Request $request,$post,$comment)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $post = Post::whereSlug($post)->first();

        if( !$post )
            return response()->json(['message'=>"No query results for model [App\\Models\\Post]."],404);

        $comment = Comment::find($comment);

        if( !$comment )
            return response()->json(['message'=>"No query results for model [App\\Models\\Comment]."],404);

        $user = Auth::user();
 

        $comment->body = $request->body; 
        $comment->save();


        return response()->json([
            'data' => $comment
        ]);
    }

    public function delete(Request $request,$post,$comment)
    {
        $post = Post::whereSlug($post)->first();

        if( !$post )
            return response()->json(['message'=>"No query results for model [App\\Models\\Post]."],404);

        $comment = Comment::find($comment);

        if( !$comment )
            return response()->json(['message'=>"No query results for model [App\\Models\\Comment]."],404);

        $comment->delete();

        return response()->json([
            'status' => 'record deleted successfully'
        ]);
    }
}