@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('expense_categories.store') }}">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-header">
                Add Expense Category
            </div>
            @include('expense_categories.form')
        </div>
    </form>
@endsection