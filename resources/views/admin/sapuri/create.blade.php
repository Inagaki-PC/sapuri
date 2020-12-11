@extends('layouts.sapurifront') <!-- layouts/admin.blade.phpを読み込む -->

@section('title', 'サプリメントの新規登録') <!-- admin.blade.phpの ｱｯﾄﾏｰｸ yield 'title' に'サプリメントの新規作成'を埋め込む -->

@section('content') <!-- admin.blade.phpの@yield('content')に以下のタグを埋め込む -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 align="center" class="sapuri_title">サプリメントの新規登録</h2>
                <div class="line">
                    <p align="center" class="lead"><em>※必要事項を入力して下さい！</em></p>
                </div>
                <form action="{{ action('Admin\SapuriController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0) <!-- countメソッドは配列の個数を返すメソッドになっています。 -->
                        <ul>
                            @foreach($errors->all() as $e) <!-- $errors` は `validate` で弾かれた内容を記憶する配列のこと -->
                                <li>{{ $e }}</li> <!-- $errorsの中身の数だけループし、その中身を$eに代入しています。 -->
                            @endforeach           <!-- $eに代入された中身を次の文で表示している -->
                        </ul>
                    @endif
                    <!---------------------------------------->
                    <div class="form-group row">
                        <label align="right" class="col-md-3">サプリ名<br>(sapuri_name)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="sapuri_name" placeholder="サプリメント名を入力して下さい">
                        </div>
                    </div>
                    <!---------------------------------------->
                    <div class="form-group row">
                        <label align="right" class="col-md-3">一日に飲む数量<br>(per_day)</label>
                        <div class="col-md-9">
                            <label><input type="number" name="per_day" min="1" max="10" value="1"> 粒</label>
                        </div>
                    </div>
                    <!---------------------------------------->
                    <div class="form-group row">
                        <label align="right" class="col-md-3">総数量<br>(total)</label>
                        <div class="col-md-9">
                            <label><input type="number" name="total" min="5" max="300" value="5"> 粒入り</label>
                        </div>
                    </div>
                    <!---------------------------------------->
                    <div class="form-group row">
                        <label align="right" class="col-md-3">サプリの種類<br>(sapuri_type)</label>
                        <div class="col-md-9">
                            <select class="form-control" name="sapuri_type">
                                <option value=""> --- 未選択 --- </option>
                                <option value="ダイエット">ダイエット</option>
                                <option value="栄養補給">栄養補給</option>
                                <option value="健康維持">健康維持</option>
                                <option value="疲れ目対策">疲れ目対策</option>
                                <option value="美容">美容</option>
                                <option value="活力">活力</option>
                                <option value="トレーニング">トレーニング</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    <!---------------------------------------->
                    <div class="form-group row">
                        <label align="right" class="col-md-3">フリーコメント<br>(free_comment)</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="free_comment" rows="2" placeholder="例：朝 1 粒、夕食後 1 粒等を記載！"></textarea>
                        </div>
                    </div>
                    <!---------------------------------------->
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <input type="submit" class="btn btn-primary" value="登録">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<!---------------------------------------->