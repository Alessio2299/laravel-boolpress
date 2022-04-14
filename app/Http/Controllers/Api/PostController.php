<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category','tags'])->paginate(2);

        $posts->each(function($post){
            if($post->image){
                $post->image = url('storage/' . $post->image);
            }else{
                $post->image = url('img/hacker-4031973_1920.jpg');
            }
            
        });
        return response()->json([
            'response' => $posts,
            'success' => true
        ]);
    }
    public function show($slug)
    {
        $post = Post::Where('slug', $slug)->with(['category','tags'])->first();   

        if($post->image){
            $post->image = url('storage/' . $post->image);
        }else{
            $post->image = url('img/hacker-4031973_1920.jpg');
        }
        
        if($post){
            return response()->json([
                'response' => $post,
                'success' => true
            ]);
        } else{
            return response()->json([
                'response' => null,
                'success' => false
            ]);
        }
    }

}
