<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::orderBy('post_date','desc')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        return view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $carbon = new Carbon;
        $carbon->setLocale('pt_BR');
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_date = $carbon->now();
        $post->user_id = Auth::user()->id;
        $post->views = 0;
        if($request->hasFile('post_image')){
            $name = uniqid(date('HisdmY'));
            $extension = $request->post_image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->post_image->storeAs('public', $nameFile);
            $post->post_image = $nameFile;  
            if(!$upload){
                return redirect()
                        ->back()
                        ->with('upload-error', 'Falha ao fazer upload...')
                        ->withInput();
            }
        }        
    
        if($post->save()){
            session()->flash('post-success', 'Post created.');
            return redirect()->route('post.index');
        }else{
            session()->flash('post-error', 'Oops, error creating post.');
            return redirect()->route('post/create')->withInput(
                $request->title,
                $request->description,
                $request->post_image
            );            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);       
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        if(!$this->authorize('delete', $post)){
            session()->flash('unauthorized');
            return response([], 403);
        }else{ 
            $post->delete();
            session()->flash('delete-success');
            return redirect()->route('post.index');             
        }        
    }
}
