<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
 
Route::get('/', 'App\Http\Controllers\MemberController@index');
 
Route::get('/show', 'App\Http\Controllers\MemberController@getMembers');
 
Route::post('/save', 'App\Http\Controllers\MemberController@save');
 
Route::post('/delete', 'App\Http\Controllers\MemberController@delete');
 
Route::post('/update', 'App\Http\Controllers\MemberController@update');