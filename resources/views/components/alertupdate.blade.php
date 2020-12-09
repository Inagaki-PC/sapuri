<!-- フラッシュメッセージ -->
@if (session()->has('update_message'))
    <div class="alert alert-success text-center">
        {{ session('update_message') }}
    </div>
@endif