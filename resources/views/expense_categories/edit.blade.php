@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('expense_categories.update', $expense_category->id) }}">
        <input type="hidden" name="_method" value="PUT">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-header">
                Update Expense Categories
            </div>
            @include('expense_categories.form')
        </div>
    </form>
@endsection
