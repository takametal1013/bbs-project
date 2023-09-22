<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<style>
  body
  {
    width: 100%;
  }
  .area{
width: 40%;
margin-bottom:10px
  }

  .form-control{
    width:100%;
     border-radius: 5px;
     background-color:#E2E3CB;
     border-width:1px;
     height:30px;
  }

  .form-box {
    margin-left:20px;
  }

h1 {
  margin-left:15px;
}

.button{
  background-color:#5AFF19;
  height:25px;
}
</style>
</head>
<body>
  <h1>投稿内容の更新</h1>
  <div class="form-box">
 {!! Form::open(['url' => 'updateForm/' . $post->id, 'enctype' => 'multipart/form-data']) !!}



<div class="area">

{!! Form::hidden('id', $post->id) !!}

{!! Form::input('text', 'upPost', $post->contents, ['required', 'class' => 'form-control']) !!}
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

</div>

<button type="submit" class="button">更新</button>
<EMPTY>
{!! Form::close() !!}
</div>
</body>
</html>
