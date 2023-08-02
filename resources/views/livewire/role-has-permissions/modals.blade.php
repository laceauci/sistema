<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Role Has Permission</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        {{ Form::label('role_id') }}
                        {{ Form::select('role_id', $roles, $role_id , [ 'wire:model' => 'role_id', 'class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                        {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('permission_id') }}
                        {{ Form::select('permission_id', $permissions, $permission_id , [ 'wire:model' => 'permission_id', 'class' => 'form-control' . ($errors->has('permission_id') ? ' is-invalid' : ''), 'placeholder' => 'Permission']) }}
                        {!! $errors->first('permission_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Role Has Permission</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        {{ Form::label('role_id') }}
                        {{ Form::select('role_id', $roles, $role_id , [ 'wire:model' => 'role_id', 'class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                        {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('permission_id') }}
                        {{ Form::select('permission_id', $permissions, $permission_id , [ 'wire:model' => 'permission_id', 'class' => 'form-control' . ($errors->has('permission_id') ? ' is-invalid' : ''), 'placeholder' => 'Permission']) }}
                        {!! $errors->first('permission_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
