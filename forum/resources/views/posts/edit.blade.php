@extends('layouts.app')

@section('page-title')
    <title>Editar Post - {{ $post->id }}</title>
@endsection

@section('content')

@if ($errors->any())
    <div class="container d-flex justify-content-center align-items-center flex-column">    
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger col-md-8" role="alert">
                {{ $error }}   
            </div>
        @endforeach  
    </div>  
@endif
@if(session()->has('upload-error'))
    <div class="alert alert-danger">
        Falha no upload do arquivo...
    </div>
@endif  
<h3 class="top-label">
    Edit post:
</h3>
<div class="container">  
    <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{  method_field('PUT') }}
        <div class="form-group">
            <label for="title"><b>Title:</b></label>
            <input type="text" class="form-control" name="title" value="{{ $errors->any() ? old('title') : @$post->title }}">            
        </div>
        <div class="form-group">
            <label for="description"><b>Description</b></label>
            <textarea class="form-control" rows="3" name="description" value="{{ @old('description')}}">
                {{ $post->description }}
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
                value="">
                {{ $post->post_image }}
        </div> 
        <div class="container d-flex justify-content-center">
            <button type="submit" class="btn btn-primary"> Editar Postagem </button>
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


