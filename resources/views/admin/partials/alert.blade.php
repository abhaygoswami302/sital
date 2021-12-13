@if (Session::get('message'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    </div>
</div>
@endif

@if ($message = Session::get('error'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        </div>
    </div>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif