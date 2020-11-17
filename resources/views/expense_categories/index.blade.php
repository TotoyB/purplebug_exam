@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="width: 35rem">
        <div class="card-header">
            Expense Categories
        </div>
        <div class="card-body">
            @if (count($expense_categories) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Display Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expense_categories as $expense_category)
                            <tr>
                                <td> <a href="{{ route('expense_categories.edit', $expense_category->id) }}">{{ $expense_category->name }}</a> </td>
                                <td>{{ $expense_category->description }}</td>
                                <td>{{ $expense_category->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Expense Categories is Empty</p>
            @endif
            {{-- @unless(auth::guest()) --}}
            <a href="{{ route('expense_categories.create') }}" class="btn btn-primary float-right"><b>+</b> Add Expense Category</a><br><br>
            {{-- @endunless --}}
            <div>{{ $expense_categories->links() }}</div>
        </div>
    </div>
@endsection
