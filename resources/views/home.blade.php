@extends('layouts.sapuri')

@section('content')
<div class="container">
    <img class="image" src="{{ asset('image/fruits1.jpg') }}"><img class="image" src="{{ asset('image/plant1.jpg') }}">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 align="center" class="card-header">サプリメント飲料を管理しましょう！</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p align="center">You are logged in!</p>
                    <br>
                    <div align="center">
                        <a href="/admin/sapuri/create" class="btn btn-primary guest-btn">サプリメントの{{ __('messages.Register') }}画面へ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
