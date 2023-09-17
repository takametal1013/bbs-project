<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
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
     background-color:#FFEFCF;
     border-width:1px;
     height:30px;
  }

  .form-box {
    margin-left:20px;
  }

h1 {
  margin-left:15px;
}

button{
  background-color:	#FDB933;
  height:25px;
}
</style>

</head>
<body>
  <h1>新しい投稿</h1>
  <div class="form-box">
{!! Form::open(['url' => 'createForm']) !!}


<div class="area">


{!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<button type="submit" class="">追加</button>

</div>
</body>
</html>
