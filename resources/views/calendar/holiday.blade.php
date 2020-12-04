@extends('layout')

@section('title', 'サプリメント管理')
@section('content')
    <h1 class="document-title">サプリメント記録の更新画面</h1><br>
    <!-- サプリメント情報入力フォーム -->
    <form method="POST" action="/holiday"> 
        <div class="form-group">
            {{csrf_field()}}
            <label for="day">日付　[入力例：yyyy-mm-dd]　※年と月と日の間にハイフンを入れて入力！ </label>
            <input type="text" name="day" class="form-control datepicker" id="day" value="{{$data->day}}">
            <br>
            <label for="description">説明</label>
            <input type="text" name="description" class="form-control" id="description" value="{{$data->description}}"> 
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
        <input type="hidden" name="id" value="{{$data->id}}">
        &emsp;&emsp;
        <u><a href="{{ url('/calendar') }}" class="back-title">サプリメント記録(カレンダー)に戻る</a></u>
        &emsp;&emsp;
        <u><a href="/admin/sapuri/" class="back-title">サプリメント一覧画面へ戻る</a></u>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- サプリメントを一覧表示させます -->
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">日付 <small>(編集・更新)</small></th>
                <th scope="col">説明</th>
                <th scope="col">作成日</th>
                <th scope="col">更新日</th>
                <th scope="col">削除する</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $val)
                <tr>
                    <!-- 日付のリンクをつける -->
                    <th scope="row"><a href="{{ url('/holiday/'.$val->id) }}">{{$val->day}}</a></th>
                        <td>{{$val->description}}</td>
                        <td>{{$val->created_at}}</td>
                        <td>{{$val->updated_at}}</td>
                    <td>
                        <form action="/holiday" method="post">
                            <input type="hidden" name="id" value="{{$val->id}}">
                                {{ method_field('delete') }}
                                {{ csrf_field() }} 
                            <button class="btn btn-outline-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <u><a href="{{ url('/calendar') }}" class="back-title">カレンダーに戻る</a></u>
    <script>
    //jsディレクトリの「app.js」内でインポートしてるので、下記内容を除外
    //     $( function() {
    //     $( "#day" ).datepicker({dateFormat: 'yy-mm-dd'});
    //     } );
    </script>
@endsection