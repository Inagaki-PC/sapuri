@extends('layouts.sapuri')
@section('title', '登録済みサプリメントの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>サプリメントの一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\SapuriController@add') }}" role="button" class="btn btn-primary">新規登録</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\SapuriController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-4">
                            <div align="right" class="search-name">サプリメント名検索</div>
                        </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-3">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                            <a href={{ action('Admin\SapuriController@index') }}>クリア</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-sapuri col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-striped table-hover">
                        <thead align="center">
                            <tr>
                                <th width="15%">サプリメント名<br>(sapuri_name)</th>
                                <th width="20%">一日当たりに飲む数量<br>(per_day)</th>
                                <th width="10%">総数量<br>(total)</th>
                                <th width="20%">サプリメントの種類<br>(sapuri_type)</th>
                                <th width="25%">※フリーコメント<br>(free_comment)</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach($posts as $sapuri)
                                <tr><!-- Str::limit()は、文字列を指定した数値で切り詰めるというメソッドになります。 -->
                                    <th>{{ $sapuri->sapuri_name  }}</th>
                                    <td>{{ str_limit($sapuri->per_day, 10) }}</td>
                                    <td>{{ str_limit($sapuri->total, 10) }}</td>
                                    <td>{{ str_limit($sapuri->sapuri_type, 50) }}</td>
                                    <td>{{ str_limit($sapuri->free_comment, 200) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('CalendarController@index', ['id' => $sapuri->id]) }}" class="btn btn-outline-secondary">日付管理</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\SapuriController@edit', ['id' => $sapuri->id]) }}" class="btn btn-outline-primary">　編集　</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\SapuriController@delete', ['id' => $sapuri->id]) }}" class="btn btn-outline-danger">　削除　</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection