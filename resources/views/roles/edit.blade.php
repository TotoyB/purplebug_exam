@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('roles.update', $role->id) }}">
    <input type="hidden" name="_method" value="PUT">
    <div class="card mx-auto" style="width: 30rem">
        <div class="card-header">
            Update Role
        </div>
        @include('roles.form')
    </div>
</form>
@endsection


{{-- <div class="modal-header">
    <h5 class="modal-title" id="editmodalLabel">Update Roles</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('roles.update', $role_->id) }}">
        <input type="hidden" name="_method" value="PUT">
        @include('roles.form')
    </form>
</div> --}}
