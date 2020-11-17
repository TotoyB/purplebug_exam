<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user_expense_category_ids = Expense::select('expense_category_id')
            ->distinct('expense_category_id')
            ->where('user_id', $user_id)->get();
        $my_expenses = [];

        foreach ($user_expense_category_ids as $user_expense_category_id) {
            $sum = Expense::where('user_id', $user_id)
                ->where('expense_category_id', $user_expense_category_id->expense_category_id)
                ->sum('amount');
            $my_expenses[] = [
                'expense_category_name' => $user_expense_category_id->expense_category->name,
                'total' => $sum
            ];
        }
        // return response()->json($my_expenses);
        return view('home')
            ->with('my_expenses', $my_expenses);
    }
}
