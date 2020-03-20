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

{{-- Mensagens de validação --}}
@if(session()->has('post-success'))
    <div class="alert alert-success sm" role="alert">
        Post criado com sucesso!
    </div>
@endif
@if(session()->has('delete-success'))
    <div class="alert alert-success sm" role="alert">
        Post deletado com sucesso!
    </div>
@elseif(session()->has('unauthorized'))
    <div class="alert alert-fail sm" role="alert">
        Seu usuário não é autorizado...
    </div>
@endif
@if(session()->has('edit-success'))
    <div class="alert alert-success sm" role="alert">
        Post editado com sucesso!
    </div>
@endif
@if(session()->has('edit-error'))
    <div class="alert alert-fail sm" role="alert">
        Post editado com sucesso!
    </div>
@endif

<div class="topo">
    <button type="button" class="btn btn-primary btn-success">
        <a href="{{route('post.create')}}">
            <i class="far fa-plus-square"></i>
            <strong>Novo Post</strong>
        </a>
    </button>
    <input type="text" name="search" id="search_text" onchange="searchPosts()" class="form-control col-sm-4" placeholder="Search posts..."> 
    
    <a id="feed" onclick="updateFeed()">Atualizar FEED
        <i class="fas fa-sync-alt"></i>
    </a>     
</div>
<br>
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
                    <strong> em 
                      {{    $post->post_date->format('d/m/Y')    }} às {{ $post->post_date->format('H:i:s') }}
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