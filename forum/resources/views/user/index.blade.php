@extends('layouts.app')

@section('page-title')
    <title>Usuários</title>
@endsection

@section('content')
<div class="container d-flex justify-content-center">
    <div class="topo-user">
        <h3 class="top-label">
            Usuários:
        </h3>
        <input type="text" class="form-control col-sm-5" name="search_user" id="search_user" placeholder="Search user..."> 
        <button type="button" class="btn btn-primary btn-success">
            <a href="{{route('user.create')}}">
                <i class="far fa-plus-square"></i>
                <strong>Novo Usuário</strong>
            </a>
        </button>
    </div>
</div>

<br>
<div class="container d-flex justify-content-center">
<table class="table table-bordered table-hover" style="width:70%">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Section</th>
        <th>Type</th>
        <th>Actions</th>
    </tr> 
    @foreach ($users as $user)
        <tr>
            <td><a href="http://localhost:8000/user/{{$user->id}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->section_id}}</td>
            <td>{{$user->type_id}}</td>
            <td>X X X</td>
        </tr>
    @endforeach   
</table>   
</div>
@endsection