@extends('layouts.sapurifront')

@section('content')
<div class="container">
    <div class="sample-box">
        <img class="image" src="{{ asset('image/sapuri_l.jpg') }}">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 align="center" class="card-header">ログインしました！<br>サプリメント登録しましょう！</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 align="center">↓ ↓サプリメント登録はこちら↓ ↓</h5>
                    <div align="center">
                        <a href="/admin/sapuri/create" class="btn btn-primary guest-btn">サプリメント登録画面へ</a>
                    </div>
                    <hr width="100">
                    <h5 align="center">↓ サプリメント登録済の方はこちらへ ↓</h5>
                    <div align="center">
                        <a href="/admin/sapuri/" class="btn btn-primary guest-btn">サプリメント一覧画面へ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
