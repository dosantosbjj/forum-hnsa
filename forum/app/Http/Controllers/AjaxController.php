<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AjaxController extends Controller
{
    public function getPosts()
    {        
        $posts = Post::orderBy('post_date','desc')->get();
        return response($posts, 200)
                ->header('Content-type','text/plain');                
    }

    public function searchPost($text){
        $posts = Post::findOrfail()->where('title','like', $text);
        return response($posts, 200)
                ->header('Content-type','application/json');
    }
}
