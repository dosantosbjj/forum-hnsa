@extends('layouts.app')

@section('page-title')
    <title> Criar usuário</title>
@endsection

@section('pre-scripts')

@endsection

@section('content')

{{-- Erros em sessão --}}
@if(session()->has('confirmation-fail'))
    <div class="alert alert-danger" role="alert">
        {{ session('confirmation-fail') }}
    </div>
@elseif(session()->has('upload-error'))
    <div class="alert alert-danger">
        {{ session('upload-error')}}
    </div>
@elseif(session()->has('user-error'))
    <div class="alert alert-danger" role="alert">
        {{ session('user-error') }}
    </div>
@endif

<div class="container"> 
    <h3 class="top-label">
        Cadastrar usuário:
    </h3>
    <br>
    <form action="{{route('user.store')}}" id="form" method="POST" enctype="multipart/form-data">
    @csrf    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name"><b>Name:</b></label>
            <input type="text" class="form-control" name="title">            
        </div>
        <div class="form-group col-md-6">
            <label for="email"><b>Email:</b></label>
            <input type="email" class="form-control" name="email">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="password"><b>Senha:</b></label>
            <input type="password" id="password" class="form-control" name="password">
        </div>    
        <div class="form-group col-md-4">
            <label for="password-confirmation"><b>Confirme a senha:</b></label>
            <input type="password" id="confirmation" onchange="check()" class="form-control" name="password-confirmation">                
        </div>  
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="type_id"><b>Tipo de usuário:</b></label>
            <select name="type_id" class="form-control">
                @foreach (App\Type::all() as $type)
                    <option value="{{$type->id}}">
                        {{ $type->description }}
                    </option>  
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="section_id"><b>Setor:</b></label>
            <select name="section_id" class="form-control">
                @foreach (App\Section::all() as $section)
                    <option value="{{$section->id}}">
                        {{ $section->description }}
                    </option>  
                @endforeach
            </select>
        </div>
    </div> 
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="user_image"><strong>Profile image:</strong> </label>
            <input type="file" name="user_image" id="user_image" class="form-control-file form-control-sm">
        </div>
    </div>
    <br>
        <button type="submit" id="save" class="btn btn-primary">Cadastrar usuário</button>
    </form>
</div>
@endsection


