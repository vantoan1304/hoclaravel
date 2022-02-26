@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif


@if(session()->has('error'))
    <div class="alert alert-warning" role="alert">
        {{ session()->get('error') }}
    </div>
@endif
