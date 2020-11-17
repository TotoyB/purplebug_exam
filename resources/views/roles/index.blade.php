@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="width: 35rem">
        <div class="card-header">
            Roles
        </div>
        <div class="card-body">
            @if (count($roles) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Display Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role_)
                            <tr>
                            <td> <a href="{{ route('roles.edit', $role_->id) }}">{{ $role_->name }}</a> </td>
                                <td>{{ $role_->description }}</td>
                                <td>{{ $role_->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Roles is Empty</p>
            @endif
            {{-- @unless(auth::guest()) --}}
            <!-- Button trigger modal -->
            <a class="btn btn-primary float-right" data-toggle="modal" data-target="#createmodal"> <b>+</b> Add Roles </a>
            {{-- @endunless --}}
            <div>{{ $roles->links() }}</div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="createmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="createmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    @include('roles.create')
                </div>
            </div>
        </div>
    </div>
@endsection
