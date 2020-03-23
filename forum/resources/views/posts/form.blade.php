@extends('layouts.app')

@section('page-title')
    <title>New Post</title>
@endsection

@section('content')

@include('partials.errors') 
<h3 class="top-label">
    Create post:
</h3>
<div class="container">  
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title"><b>Title:</b></label>
            <input type="text" class="form-control" name="title" value="{{ old('title')}}">            
        </div>
        <div class="form-group">
            <label for="description"><b>Description</b></label>
            <textarea class="form-control" rows="3" name="description" value="{{ old('description')}}">
            </textarea>
        </div>        
        <div class="form-group">
            <label for="post_image">
                <b>Update a image</b>
            </label>
            <input type="file" 
                name="post_image" 
                id="image" 
                class="form-control-file form-control-sm col-md-6" 
                value="{{ old('post_image') }}">
        </div> 
        <div class="container d-flex justify-content-center">
            <button type="submit" class="btn btn-primary"> Post It </button>
        </div>
    </form>
</div>
<br>
<div class="return">
    <a href="{{route('post.index')}}">
        <i class="fas fa-long-arrow-alt-left"></i>
        Voltar para posts        
    </a>
</div>
@endsection


