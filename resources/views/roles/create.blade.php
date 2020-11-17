<div class="modal-header">
    <h5 class="modal-title" id="createmodalLabel">Add Roles</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('roles.store') }}">
        @include('roles.form')
    </form>
</div>
