<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class RelatedController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relatedPosts = Post::where('category_id', $id)->with(['category','tags'])->get();
        
        return response()->json([
            'response' => $relatedPosts,
            'success' => true
        ]);
    }
}
