<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* route API Book */
// Index
Route::get('/books', function(){
    $data =[
        'message' => 'Function /books desde route',
        'status' => 200
    ];
    return response()->json($data,200);
});

// show
Route::get('/books/{id}', function (){
    return "Function GET /books/{id} desde route";
});

// store
Route::post('/books', function(){ return " Function Post desde route";});
// update
Route::patch('/books/{id}', function(){ return " Function Patch books/{id} desde route";});
// delete
Route::delete('/books/{id}}', function(){ return " Function Delete books/{id} desde route";});
