@extends('layouts.sapurifront')

@section('content')
    <div class="container">
        <img class="image" src="{{ asset('image/running1.jpg') }}"><img class="image" src="{{ asset('image/plant1.jpg') }}">
        <h3 align="center" class="card-header">サプリメントを毎日飲む習慣をつけましょう！</h3>
        <hr>
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <u><font size="6">♦これまでの編集履歴</font></u>
                                <p><?php date_default_timezone_set('Asia/Tokyo');
                                echo '<p>', date('Y年m月d日 H時i分s秒'), '</p>'; ?></p>
                                <div class="sapuri_name p-2">
                                    <h2>サプリメント名：{{ str_limit($headline->sapuri_name, 20) }}</h2>
                                </div>
                                <div class="per_day p-2">
                                    <h5>一日当たりに飲む数：{{ str_limit($headline->per_day, 10) }} 粒</h5>
                                </div>
                                <div class="total p-2">
                                    <h5>総数量：{{ str_limit($headline->total, 10) }} 粒入り</h5>
                                </div>
                                <div class="sapuri_type p-2">
                                    <h5>サプリメントの種類：{{ str_limit($headline->sapuri_type, 50) }} 系</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="free_comment mx-auto">{{ str_limit($headline->free_comment, 200) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr>
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="sapuri_name">
                                    {{ str_limit($post->sapuri_name, 100) }}
                                </div>
                                <div class="per_day">
                                    {{ str_limit($post->per_day, 90) }}
                                </div>
                                <div class="total">
                                    {{ str_limit($post->total, 90) }}
                                </div>
                                <div class="sapuri_type">
                                    {{ str_limit($post->sapuri_type, 100) }}
                                </div>
                                <div class="free_comment mt-3">
                                    {{ str_limit($post->free_comment, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection