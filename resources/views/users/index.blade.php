@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="width: 35rem">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if (count($users) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> <a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a> </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Users is Empty</p>
            @endif
            {{-- @unless(auth::guest()) --}}
            <a href="{{ route('users.create') }}" class="btn btn-primary float-right"><b>+</b> Add Users</a><br><br>
            {{-- @endunless --}}
            <div>{{ $users->links() }}</div>
        </div>
    </div>
@endsection
