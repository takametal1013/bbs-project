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

                         @csrf

                            <input type="text" name="keyword" placeholder="検索キーワード">
                            <input type="submit" value="検索">
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
                    <!-- <td>?php echo htmlspecialchar($list['id']); ?></td>

                    <td>?php echo htmlspecialchar($list['post']); ?></td>

                    <td>?php echo htmlspecialchar($list['created_at']); ?></td>
                    この記述を省ける↓ -->

                    <td>{{ $list->id }}</td>

                    <td>{{ $list->user_name }}</td>

                    <td>{{ $list->contents }}</td>

                    <td>{{ $list->created_at }}</td>

                    <td><a class="btn btn-primary" href="/updateForm/{{ $list->id }}">更新</a></td>

                    <td><form method="POST" action="/post/{{ $list->id }}/delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a>
                </form>
                </td>

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
