<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user() != null && auth()->user()->role->name == 'Administrator') {
            $expense_categories = ExpenseCategory::orderBy('name', 'asc')->paginate(5);
            return view('expense_categories.index')->with('expense_categories', $expense_categories);
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
        if (auth()->user() != null && auth()->user()->role->name == 'Administrator') {
            return view('expense_categories.create');
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $expense_category = new ExpenseCategory();
        $expense_category->name = $request->name;
        $expense_category->description = $request->description;
        $expense_category->save();

        return redirect()->route('expense_categories.index')
            ->with('success', 'Expense Category ' . $expense_category->name . ' Successfully Added');
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
        if (auth()->user() != null && auth()->user()->role->name == 'Administrator') {
            $expense_category = ExpenseCategory::find($id);
            return view('expense_categories.edit')->with('expense_category', $expense_category);
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $expense_category = ExpenseCategory::find($id);
        $expense_category->name = $request->name;
        $expense_category->description = $request->description;
        $expense_category->save();

        return redirect()->route('expense_categories.index')
            ->with('success', 'Expense Category ' . $expense_category->name . ' has been Successfully Updated');
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
