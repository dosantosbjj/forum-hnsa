@extends('layouts.app')

@section('page-title')
    <title>Usuários</title>
@endsection

@section('content')

@if(session()->has('user-created'))
    <div class=" alert alert-success">
        {{  session('user-created') }}    
    </div>
@endif

<div class="container d-flex justify-content-center">
    <div class="topo-user">
        <h3 class="top-label">
            Usuários:
        </h3>
        <button type="button" class="btn btn-primary btn-success">
            <a href="{{route('user.create')}}">
                <i class="far fa-plus-square"></i>
                <strong>Novo Usuário</strong>
            </a>
        </button>
    </div>
</div>

<br>
<div class="container">
<table class="table table-bordered table-hover" id="users_table" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Section</th>
            <th>Type</th>
            <th>Actions</th>
        </tr> 
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td><a href="http://localhost:8000/user/{{$user->id}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->section->description}}</td>
            <td>{{$user->type->description}}</td>
            <td>X X X</td>
        </tr>
    @endforeach 
    </tbody>  
</table>   
</div>
@endsection


