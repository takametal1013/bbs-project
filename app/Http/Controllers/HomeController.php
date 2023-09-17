<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;  // Postモデルをインポート
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $lists = Post::all();  // Postモデルを使用してすべての投稿を取得

    return view('home', ['lists' => $lists]);  // 取得した投稿をビューに渡す
}
}
