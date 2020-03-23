@extends('layouts.app')

@section('page-title')
    @if(count($post->comments) > 0)
        <title>({{count($post->comments)}}) Fórum - Post </title>
    @else
        <title>Fórum - Post </title>
    @endif
    
@endsection

@section('pre-scripts')
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>	
@endsection

@section('content')
<div class="container">
    @include('partials.validations')
    <article>
        <h2 class="top-label">
            {{$post->title}}
        </h2>
        <p>
            @php 
                $user = App\User::find(($post->user_id));
            @endphp
                By: <b>{{ $user->name }}</b>            
        </p>
        <div class="image-box">
            <img src="{{ url("storage/".$post->post_image) }}" class="post-img" alt="post-image">
        </div>
        <p class="post-text">
            {{$post->description}}
        </p>
    </article>
    
    <div class="comments-box">
        <h2 class="top-label">Comments
            <i class="far fa-comments"></i>
        </h2>
        @if(count($post->comments) >= 1)
            @foreach($post->comments as $comment)
            <div class="comment">            
                <p><b>Comment:</b></p>
                <h4><i>{{ '"' . $comment->comment . '"' }}</i></h4>
                    @php 
                        $user = App\User::find(($comment->author_id));
                    @endphp
                <p>
                    <span>
                        By: <b>{{ $user->name }}</b>
                        At: <i>{{ Carbon\Carbon::parse($comment->comment_date)->format('d/m/Y h:m') }}</i>
                    </span>
                </p>
            </div>
        @endforeach
        @else
            <i>No comments to show for this post...</i> 
            <br>
        @endif
        <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="row">
                <div class="container-d-flex justify-content-center">
                    <p>Type a Comment:</p>
                    <textarea style="width:100%" name="comment" cols="100" rows="5" placeholder="Comment here...">
                    </textarea> 
                    <br>    
                </div>            
            </div>
            <div class="row container-d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Save comment</button>  
            </div>            
        </form>       
    </div>
    {{-- <div class="return">
        <a href="{{route('post.index')}}">
            <i class="fas fa-long-arrow-alt-left">
                Voltar para posts
            </i>
        </a>
    </div> --}}
</div>
@endsection
