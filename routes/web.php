<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Routing -> Parameters
Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: " . $postId . "-Comment: " . $comment;
});

Route::get('/post/{id}', function (string $id) {
    return $id; 
}) ->where ('id', '[0-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search; 
}) ->where ('search', '.*');


//Named Route or Route Alias
Route::get('/test/route', function () {
    return route ('test-route');
}) ->name ('test-route');


//Route -> Middleware Group
Route::middleware(['user-middleware'])->group(function(){
    Route::get('route-middleware-group/first', function (request $request) {
        echo 'first';
    });
    Route::get('route-middleware-group/second', function (request $request) {
        echo 'second';
    });   
});

//Route -> Controller
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users{id}', 'show');
});

//CSRF
Route::get('/token', function (Request $request){
    return view('token');
});

Route::post('/token', function (Request $request){
    return $request->all();
});