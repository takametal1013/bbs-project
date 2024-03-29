<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function showpost()
    {
        $lists = Post::all();  // Postモデルを使用してすべての投稿を取得

        return view('home', ['lists' => $lists]);  // 取得した投稿をビューに渡す
    }


    public function store(Request $request)
    {
        $post = new Post;
        $post->user_name = Auth::user()->name;
        $post->contents = $request->input('contents');
        $post->save();

        return redirect('/home');
    }

    //クリエイトフォームの表示
    public function showcreate()
    {
        return view('createForm');
    }

    //クリエイト機能
    public function create(Request $request)
    {
        //例外処理
        $rules = [
            'newPost' => 'required|string|max:100',
        ];
        $messages = [
            'newPost.required' => '文字を入力して下さい',
            'newPost.max' => '入力は100文字以内にして下さい',
        ];
        $request->validate($rules, $messages);


        $post = new Post;
        $post->contents = $request->input('newPost');
        $post->user_name = Auth::user()->name;  // ユーザー名を設定
        $post->save();

        return redirect('/home');
    }

//アップデートフォーム表示
    public function showupdate($id)
    {
        $post = DB::table('posts')->find($id);
        return view('updateForm', ['post' => $post]);
    }



    //アップデート
   public function update(Request $request)
 {
    $id = $request->input('id');
    $up_post = $request->input('upPost');

    // 入力値が空白（スペースのみ）でないことを確認
    if (trim($up_post) === '') {
        // エラーメッセージを表示
        return redirect()->back()->with('error', '投稿内容は空白にできません');
    }

    // 入力値が100文字以下であることを確認
    if (mb_strlen($up_post) > 100) {
        // エラーメッセージを表示
        return redirect()->back()->with('error', '投稿内容は100文字以下に収めてください');
    }

    DB::table('posts')
    ->where('id', $id)
    ->update(
        ['contents' => $up_post]
    );

    return redirect('/home');
 }







    public function delete($id)
 {
    DB::table('posts')->where('id', $id)->delete();
    return redirect('/home');
 }


    //検索
    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    if (!empty($keyword)) {
        $lists = Post::where('contents', 'LIKE', "%{$keyword}%")->get();

        // 検索結果が0件の場合、エラーメッセージをセッションに保存
        if ($lists->isEmpty()) {
            session()->flash('error', '検索結果は0件です。');
        }
    } else {
        $lists = Post::all();
        // キーワードが空の場合、エラーメッセージをクリア
        session()->forget('error');
    }

    return view('home', ['lists' => $lists]);
    }


    //ログイン機能に関して追加
    public function __construct()
    {
        $this->middleware('auth');
    }






}
