@csrf
<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}"
                placeholder="Name">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
        <div class="col-md-6">
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}"
                placeholder="Email">
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
        </div>
    </div>

    @if (auth::user()->role->name == 'Administrator')
        @if ($action == 'edit' && $user->role->name == 'Administrator')
            <input type="hidden" name="role_id" value="{{ $user->role_id }}">
        @else
            <div class="form-group row">
                <label for="role_id" class="col-md-4 col-form-label text-md-right">Role</label>
                <div class="col-md-6">
                    <select name="role_id" id="role_id" class="form-control">
                        <option value={{ $user->role_id ?? '' }}>--{{ $user->role->name ?? 'Select One'}}--</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
    @else
        <input type="hidden" name="role_id" value="{{ $user->role_id }}">
    @endif

    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('users.index') }}">Cancel</a>
        <input type="submit" value="Save" class="btn btn-success"
            onclick="this.disabled=true;this.value='Processing...';this.form.submit();">
    </div>
</div>
