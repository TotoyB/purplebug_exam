<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user() != null) {
            $user_id = auth()->user()->id;
            $expenses = Expense::where('user_id', $user_id)->orderBy('created_at', 'asc')->paginate(5);
            return view('expenses.index')->with('expenses', $expenses);
        }
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user() != null) {
            $expense_categories = ExpenseCategory::orderBy('name', 'asc')->get();
            return view('expenses.create')->with('expense_categories', $expense_categories);
        }
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'expense_category_id' => 'required',
            'amount' => 'required',
            'entry_date' => 'required'
        ]);

        $expense = new Expense();
        $expense->user_id = auth()->user()->id;
        $expense->expense_category_id = $request->expense_category_id;
        $expense->amount = $request->amount;
        $expense->entry_date = $request->entry_date;
        $expense->save();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense ' . $expense->expense_category->name . ' Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user() != null) {
            $expense_categories = ExpenseCategory::orderBy('name', 'asc')->get();
            $expense = Expense::find($id);
            return view('expenses.edit')
                ->with('expense', $expense)
                ->with('expense_categories', $expense_categories);
        }
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'expense_category_id' => 'required',
            'amount' => 'required',
            'entry_date' => 'required'
        ]);

        $expense = Expense::find($id);
        $expense->expense_category_id = $request->expense_category_id;
        $expense->amount = $request->amount;
        $expense->entry_date = $request->entry_date;
        $expense->save();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense ' . $expense->expense_category->name . ' has been Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
