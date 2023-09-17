<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ログインフォームから新規登録へ
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//新規登録からログインフォームへ
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

//ログイン後の画面
Route::get('/home', [PostController::class, 'showpost']);
Route::post('/home', [PostController::class, 'store']);

//クリエイトfoam表示
Route::get('createForm',[PostController::class,'showcreate']);
//クリエイト機能
Route::post('/createForm', [PostController::class, 'create']);

//アップデート表示
Route::get('/updateForm/{id}',[PostController::class,'showupdate']);
//アップデート
Route::post('/updateForm/{id}',[PostController::class,'update']);
//デリート機能
Route::delete('/post/{id}/delete', [PostController::class, 'delete']);

//検索機能
Route::get('/home', [PostController::class, 'search'])->name('home');
