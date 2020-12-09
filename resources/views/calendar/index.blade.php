@extends('layout')

@section('title', '飲料記録')
@section('content')
    <h1 class="document-title">サプリメント記録</h1>
    {!!$cal_tag!!}
    <a href="{{ url('/holiday') }}" class="btn btn-outline-primary">サプリメント記録をつける</a>
    &emsp;&emsp;
    <u><a href="/admin/sapuri/" class="back-title">サプリメント一覧画面へ戻る</a></u>
@endsection