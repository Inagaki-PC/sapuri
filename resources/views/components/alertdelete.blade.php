<!-- フラッシュメッセージ -->
@if (session()->has('delete_message'))
    <div class="alert alert-danger text-center">
        {{ session('delete_message') }}
    </div>
@endif