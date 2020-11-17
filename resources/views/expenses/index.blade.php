@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="width: 35rem">
        <div class="card-header">
            Expenses
        </div>
        <div class="card-body">
            @if (count($expenses) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Expense Category</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Entry Date</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $expense)
                            <tr>
                                <td><a href="{{ route('expenses.edit', $expense->id) }}">
                                        {{ $expense->expense_category->name }}</a>
                                </td>
                                <td>₱{{ $expense->amount }}</td>
                                <td>{{ $expense->entry_date }}</td>
                                <td>{{ $expense->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Expenses is Empty</p>
            @endif
            {{-- @unless(auth::guest()) --}}
            <a href="{{ route('expenses.create') }}" class="btn btn-primary float-right"><b>+</b> Add Expenses </a><br><br>
            {{-- @endunless --}}
            <div>{{ $expenses->links() }}</div>
        </div>
    </div>
@endsection
