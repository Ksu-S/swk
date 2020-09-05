<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\User;
use App\Highscore;
use Illuminate\Support\Facades\File;


Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Auth::routes();
 
Route::group(['middleware' => ['auth', 'instagram']], function(){
 
    Route::get('/', 'AppController@index');
 
    Route::get('/search', 'AppController@search');
 
    Route::get('/instagram', 'InstagramController@redirectToInstagramProvider');
 
    Route::get('/instagram/callback', 'InstagramController@handleProviderInstagramCallback');
});