<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('discussion','DiscussionController');

Route::resource('discussion/{discussion}/reply', 'RepliesController');

Route::post('discussion/{discussion}/reply/{reply}/mark-as-best-reply', 'DiscussionController@reply')->name('mark-best-reply');
    

Route::get('user/notifications',[UserController::class,'notifications'])->name('user.notification');