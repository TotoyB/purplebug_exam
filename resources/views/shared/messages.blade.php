@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p> {{ count($errors) }} Error/s preventing this action. </p>
        @foreach ($errors->all() as $error)
            <li>{{ $error }} <br></li>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
