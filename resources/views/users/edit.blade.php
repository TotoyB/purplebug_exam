@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        <input type="hidden" name="_method" value="PUT">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-header">
                Update User
            </div>
            @include('users.form')
        </div>
    </form>
@endsection
