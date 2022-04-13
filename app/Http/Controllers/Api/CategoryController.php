<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $relatedPosts = Category::where('id', $id)->with(['post'])->get();
        
        return response()->json([
            'response' => $relatedPosts,
            'success' => true
        ]);
    }

    
}
