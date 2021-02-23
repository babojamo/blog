<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Post;

class UserBlogController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title'     => 'required|string',
            'content'   => 'required|string',
            'image'     => 'required|string',
        ]);

        $user = Auth::user();
        $slug = Str::slug($request->title, '-');

        $post  = Post::create([
            'title'     => $request->title, 
            'content'   => $request->content,
            'slug'      => $slug,
            'user_id'   => $user->id,
            'image'     => $request->image,
        ]);

        return response()->json([
            'data' => $post
        ]);
    }

    public function update(Request $request,$post)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $post = Post::whereSlug($post)->first();

        if( !$post )
            return response()->json(['message'=>"No query results for model [App\\Models\\Post]."],404);
            
        $slug = Str::slug($request->title, '-');
 
        $post->title = $request->title;
        $post->slug  = $slug;
        $post->save();

        return response()->json([
            'data' => $post
        ]);
    }

    public function delete(Request $request,$post)
    {
 
        $post = Post::whereSlug($post)->first();

        if( !$post )
            return response()->json(['message'=>"No query results for model [App\\Models\\Post]."],404);
     
        $post->delete();

        return response()->json([
            "status" => "record deleted successfully"
        ]);
    }
}