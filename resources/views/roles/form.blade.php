@csrf
<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Display Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name ?? '' }}"
                placeholder="Role Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="description" name="description"
                value="{{ $role->description ?? '' }}" placeholder="Description">
        </div>
    </div>
    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('roles.index') }}" data-dismiss="modal">Cancel</a>
        <input type="submit" value="Save" class="btn btn-success"
            onclick="this.disabled=true;this.value='Processing...';this.form.submit();">
    </div>
</div>
