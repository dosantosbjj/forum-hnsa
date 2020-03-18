<?php

Auth::routes();

Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::resource('post', 'PostController');
Route::resource('comments','CommentsController');
Route::resource('user','UserController');
