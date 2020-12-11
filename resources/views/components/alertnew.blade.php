<!-- フラッシュメッセージ -->
@if (session()->has('new_message'))
    <div class="alert alert-info text-center">
        {{ session('new_message') }}
    </div>
    {{ Session::forget('new_message') }}
@endif