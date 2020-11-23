@extends('layouts.sapurifront')

@section('content')
    <div class="container">
        <div class="sample-box">
            <img class="image" src="{{ asset('image/running1.jpg') }}"><img class="image" src="{{ asset('image/plant1.jpg') }}">
            <div class="first-comment">
                <h3>ダイエット管理に！</h3>
            </div>
            <div class="second-comment">
                <h3>健康維持管理に！</h3>
            </div>
        </div>
        <h2 align="center" class="card-header">よくサプリメントの飲み忘れる方へ！<br>サプリメントを毎日飲む習慣をつけましょう！</h2>
        <hr>
        <div class="top-comment js-trigger">
            <h3 align="center" >「サプリメント飲料を記録」や「手持ちのサプリ残数の把握」が手軽にできるツールです！</h3>
        </div>
        <div align="center" class="sapuri-list">
            <a href="/admin/sapuri/" class="btn btn-primary guest-btn">サプリメント一覧画面へ</a>
        </div>
        <hr size=5>
        <p id="RealtimeClockArea">※ここに時計(2桁固定版)が表示されます。</p>
            <script type="text/javascript">
                function set2fig(num) {
                // 桁数が1桁だったら先頭に0を加えて2桁に調整する
                    var ret;
                    if( num < 10 ) { ret = "0" + num; }
                    else { ret = num; }
                    return ret;
                    }
                    function showClock2() {
                        var nowTime = new Date();
                        var nowHour = set2fig( nowTime.getHours() );
                        var nowMin = set2fig( nowTime.getMinutes() );
                        var nowSec = set2fig( nowTime.getSeconds() );
                        var msg = "現在時刻は、" + nowHour + ":" + nowMin + ":" + nowSec + " です。";
                    document.getElementById("RealtimeClockArea").innerHTML = msg;
                }
                setInterval('showClock2()',1000);
            </script>
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="sapuri_name p-2">
                                    <h1>♦編集履歴♦</h1>
                                </div>
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
        </div> -->
    </div>
    </div>
@endsection