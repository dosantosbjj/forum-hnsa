@extends('layouts.app')

@section('page-title')
    <title> Usuário </title>
@endsection

@section('content')

<h3 class="top-label">
    Usuário:
</h3>
<br>

<div class="container d-flex justify-content-center">
    <div class="card" style="width: 24rem;">
        <div class="card-body">
          <h5 class="card-title">Dados do usuário:</h5>
        </div>
        <div class="avatar">
            <img src="{{ url("storage/users/".$user->user_image) }}" class="round" alt="Imagem do usuário">
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"></li>
            <li class="list-group-item">
                <b>Nome: </b>{{ $user->name }}
            </li>
            <li class="list-group-item"><b>Email:</b> {{$user->email}}</li>
              @switch($user->type_id)
                @case(1)
                    <li class="list-group-item">
                        <b>Tipo:</b> Usuário
                    </li>
                @break       
                @case(2)
                    <li class="list-group-item">
                        <b>Tipo:</b> Administrador
                    </li>
                @break                    
              @endswitch 
            <li class="list-group-item">
              <b>Posts:</b> {{count(App\Post::all()->where('user_id', $user->id))}} 
            </li>
            <li class="list-group-item">
                <b>Setor:</b>                   
                    @php 
                        $setor = App\Section::find($user->section_id) 
                    @endphp
                    {{ $setor->description }}                                
            </li>
        </ul>
      </div>      
</div>
<br>
<div class="return">
    <a href="{{route('post.index')}}">
        <i class="fas fa-long-arrow-alt-left">
            Voltar para usuários
        </i>
    </a>
</div>
@endsection


