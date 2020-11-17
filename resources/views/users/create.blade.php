@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-header">
                Add Users
            </div>
            @include('users.form')
        </div>
    </form>
@endsection