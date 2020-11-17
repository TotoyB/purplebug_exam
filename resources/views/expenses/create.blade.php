@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('expenses.store') }}">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-header">
                Add Expenses
            </div>
            @include('expenses.form')
        </div>
    </form>
@endsection