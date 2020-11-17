@csrf
<div class="card-body">
    <div class="form-group row">
        <label for="expense_category_id" class="col-md-4 col-form-label text-md-right">Expense Category</label>
        <div class="col-md-6">
            <select name="expense_category_id" id="expense_category_id" class="form-control">
                <option value={{ $expense->expense_category_id ?? '' }}>
                    --{{ $expense->expense_category->name ?? 'Select One' }}--</option>
                @foreach ($expense_categories as $expense_category)
                    <option value="{{ $expense_category->id }}">{{ $expense_category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
        <div class="col-md-6">
            <input type="number" class="form-control" id="amount" name="amount" min="1"
                value="{{ $expense->amount ?? '' }}" placeholder="₱ 0.00">
        </div>
    </div>

    <div class="form-group row">
        <label for="entry_date" class="col-md-4 col-form-label text-md-right">Entry Date</label>
        <div class="col-md-6">
            <input type="date" class="form-control" id="entry_date" name="entry_date"
                value="{{ $expense->entry_date ?? '' }}">
        </div>
    </div>

    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('expenses.index') }}">Cancel</a>
        <input type="submit" value="Save" class="btn btn-success"
            onclick="this.disabled=true;this.value='Processing...';this.form.submit();">
    </div>
</div>
