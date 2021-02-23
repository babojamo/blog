<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Comment;
use App\Models\Post;

class BlogPostController extends Controller
{
    public function posts()
    { 
        $posts  = Post::on();
        $posts = $posts->paginate(10);

        return response()->json($posts);
    }

    public function show($post)
    { 
        $post = Post::whereSlug($post)->first();

        if( !$post )
            return response()->json(['message'=>"No query results for model [App\\Models\\Post]."],404);
         
        return response()->json([
            'data'=>[
                "id"            => $post->id,
                "user_id"       => $post->creator_id,
                "title"         => $post->title,
                "slug"          => $post->slug,
                "content"       => $post->content,
                "created_at"    => $post->created_at,
                "updated_at"    => $post->updated_at,
                "deleted_at"    => $post->deleted_at,
                'image'         => $post->image,
            ]
        ]);
    }

    public function comments($post)
    {
        $post = Post::whereSlug($post)->first();

        if( !$post )
            return response()->json(['message'=>"No query results for model [App\\Models\\Post]."],404);

        $comments = Comment::whereParentId($post->id);
        $comments = $comments->get();

        return response()->json([
            'data' => $comments,
        ]);
    }
}