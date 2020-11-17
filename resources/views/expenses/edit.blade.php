@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('expenses.update', $expense->id) }}">
        <input type="hidden" name="_method" value="PUT">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-header">
                Update Expenses
            </div>
            @include('expenses.form')
        </div>
    </form>
@endsection
