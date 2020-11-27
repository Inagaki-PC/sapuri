@extends('layout')
@section('title', 'カレンダー')
@section('content')
    {!!$cal_tag!!}
    <a href="{{ url('/holiday') }}">サプリメント管理</a>
@endsection