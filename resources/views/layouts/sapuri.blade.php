<!DOUCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"> <!-- このコードは日本語のWebサイトであるという意味合い -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- windowsの基本ブラウザであるedgeに対応するという記載。 -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- 画面幅を小さくしたとき、例えばスマートフォンで見たときなどに文字や画像の大きさを調整してくれるタグです。 -->
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- ※CSRF保護を受けられる　※Webアプリケーション利用者自身が意図しない処理が実行されてしまう脆弱性または攻撃手法 -->
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。--}}
        <title>@yield('title')</title><!-- @マーク記載の部分はメソッドを読み込んでいる -->
        
        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script> <!-- Laravel標準で用意されているJavascriptを読み込みます --><!-- asset('ファイルパス')はpublicディレクトリのパスを返す関数。-->
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet"> <!-- Laravel標準で用意されているCSSを読み込みます -->
        <link href="{{ secure_asset('css/sapuri.css') }}" rel="stylesheet"> <!-- 後で作成するCSSを読み込みます -->
        	<style>
            </style>
    </head>
    <body>
        <div class="wrapper">
            <!-- 画面上部に表示するナビゲーションバーです。 -->
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ url('/') }}"> <!-- url(“パス”)は、そのまんまURLを返すメソッドです。 -->
                    Sapuri <!-- configフォルダのapp.phpの中にあるnameにアクセスをします。 -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-right ml-auto">
                        <ul>
                            <!-- Authentication Links -->
                            {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                            @guest
                                <li><a class="btn btn-outline-primary guest-btn" href="{{ route('register') }}">{{ __('messages.Register') }}</a></li>
                                
                                <li><a class="btn btn-outline-primary guest-btn" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                               
                            {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <u>{{ Auth::user()->name }}</u> <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <u>{{ __('messages.Logout') }}</u>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- ここまでナビゲーションバー -->
            <main class="py-4">
                @yield('content') {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
            </main>
            <footer>
                <p class="footer-title">サプリメント管理アプリ(Supplement_document)</p>
            </footer>
        </div>
    </body>
</html>