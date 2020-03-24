<?php

use App\Http\Middleware\CheckUser;

Auth::routes();

Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::resource('post', 'PostController');
Route::resource('comments','CommentsController');
Route::group(['middleware' => CheckUser::class], function() {
    Route::resource('user','UserController');
});


