@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                @section('content')

                    <div class='container'>

                <h2 class='title-header'>投稿一覧</h2>

                    <div>
                        <form action="{{ route('home') }}" method="GET">
                        <EMPTY>

                         @csrf

                            <input type="text" name="keyword" placeholder="検索キーワード">
                            <input type="submit" value="検索">
                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif

                        </form>
                    </div>





                    <table class='table table-hover'>

                    <tr>

                    <th>No</th>

                    <th>投稿者</th>

                    <th>投稿内容</th>

                    <th>投稿日時</th>

                    <th></th>

                    <th></th>

                    </tr>

                    @foreach ($lists as $list)
                    <tr>
                        <td>{{ $list->id }}</td>
                        <td>{{ $list->user_name }}</td>
                        <td>{{ $list->contents }}</td>
                        <td>{{ $list->created_at }}</td>

                        @if (Auth::user()->name == $list->user_name)
                            <td><a class="btn btn-primary" href="/updateForm/{{ $list->id }}">更新</a></td>
                            <td>
                                <form method="POST" action="/post/{{ $list->id }}/delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</button>
                                </form>
                            </td>
                        @else
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                    @endforeach


                <button class="btn-case">
                   <a href="{{ url('/createForm') }}" class="btn-color">新規投稿</a>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
