@extends('layouts.app')

@section('page-title')
   <title>Posts</title>
@endsection

@section('pre-scripts')

    {{-- scripts --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection

@section('content')
<div class="container">

@include('partials.validations')

<div class="topo">
    <a href="{{route('post.create')}}">
        <i class="far fa-plus-square new-icon">
        </i>
        <h3 class="icon-label">Criar postagem</h3>        
    </a>    
    <a id="feed" onclick="updateFeed()">Atualizar FEED
        <i class="fas fa-sync-alt"></i>
    </a>     
</div>
<div>
    <h2 class="top-label">Posts</h2>
</div>
<div class="postagens" id="postagens">
@foreach ($posts as $post)
    <div class="post">
        <div class="post-body">
            <div class="interaction">
                <h5 class="post-title">
                    {{$post->title}}
                </h5>
            @can('delete', $post)
                <form action="{{route('post.destroy', $post->id)}}" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" onclick="return confirm('Confirma a exclusão?')">
                        <i class="far fa-times-circle"></i>   
                    </button>                
                </form>                  
            @endcan
            </div>            
            <h6 class="card-subtitle mb-2 text-muted">
                @php 
                    $user = App\User::find(($post->user_id));
                @endphp
                <span class="topo">
                    <i>{{ $user->name }}</i> 
                    <strong>
                      {{    $post->post_date->diffForHumans()    }}
                    </strong>        
                </span>          
            </h6>
            <p class="card-text">
                {{substr($post->description, 0 , 200) . '...'}}
            </p>
            <div class="interaction">            
                <a href="http://localhost:8000/post/{{$post->id}}" class="btn btn-primary">
                    View Post
                </a> 
                <span> 
                    <i class="far fa-comments icon"></i><b>{{ count($post->comments) }}</b>           
                    <i class="far fa-eye icon"></i><b>{{ $post->views }}</b>
                </span>               
            </div>
        </div>
    </div>    
@endforeach
</div>

@endsection
@section('post-scripts')

<script>

    // Atualizar página
    function updateFeed(){
        location.reload(true);
    }

    // Pesquisa com ajax - será implementado
    function searchPosts(){
        var searchText = document.getElementById("search_text");
        console.log(searchText.value);
    }
</script> 


@endsection