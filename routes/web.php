<?php

use App\Models\Talk;
use App\Models\User;
use App\Models\Reply;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReplyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can User web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index', [
        "title" => "Home",
        "talks" => Talk::latest()->get(),
        "users" => User::limit(3)->get(),
        "replies" => Reply::all()
    ]);
})->middleware("auth");
Route::get('/home', function () {
    return view('index', [
        "title" => "Home",
        "talks" => Talk::latest()->get(),
        "users" => User::limit(3)->get(),
        "replies" => Reply::all()
    ]);
})->middleware("auth");
Route::get('/profile/{user:username}',function(User $user){
   
    return view("/profile", [
        "user" => $user,
        "title" => $user->username,
        "users" => User::limit(3)->get(),
        "replies" => Reply::all()
    ]);
})->middleware("auth");

Route::get('/explore', function(){ return view("explore",[
        "title" => "Explore",
        "users" => User::limit(3)->get(),
        "users2" => User::all()
    ]);
})->middleware("auth");
Route::get('/talks/create',[TalkController::class,'create'])->middleware("auth");
Route::post('/talks',[TalkController::class,'store'])->middleware("auth");
Route::delete('/talks/{talk}',[TalkController::class,'destroy'])->middleware("auth");
Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate'])->name('login')->middleware('guest');
Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware("auth");
Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::post('/register',[UserController::class,'store']);
Route::get('/user/{user:username}/edit',[UserController::class,'edit'])->middleware("auth");
Route::put('/user/{user}',[UserController::class,'update'])->middleware("auth");
Route::post("/reply", [ReplyController::class,"store"])->middleware("auth");
Route::delete("/reply/{reply}", [ReplyController::class,"store"])->middleware("auth");