@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Expenses</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-body">
                            @if (count($my_expenses) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Expense Categories</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($my_expenses as $my_expense)
                                        <tr>
                                            <td>{{ $my_expense['expense_category_name'] }}</td>
                                            <td>₱{{ $my_expense['total'] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Expenses is Empty</p>
                            @endif
                            {{-- @unless(auth::guest()) --}}
                            {{-- <a href="{{ route('users.create') }}"
                                class="btn btn-primary float-right"><b>+</b> Add
                                Users</a><br><br> --}}
                            {{-- @endunless --}}
                            {{-- <div>{{ $expense_category->links() }}</div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
