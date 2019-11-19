@if (session('error'))
    <div class="alert alert-danger" style="margin-top: 80px;">
        {{ session('error') }}
    </div>
@endif

HELLO
