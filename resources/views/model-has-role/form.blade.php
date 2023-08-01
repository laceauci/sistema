<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Rol') }}
            {{ Form::select('role_id',$roles, $modelHasRole->role_id, ['class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : ''), 'placeholder' => 'Role Id']) }}
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('model_type') }}
            {{ Form::text('model_type', $modelHasRole->model_type, ['class' => 'form-control' . ($errors->has('model_type') ? ' is-invalid' : ''), 'placeholder' => 'Model Type']) }}
            {!! $errors->first('model_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Usuario') }}
            {{ Form::select('model_id', $users ,$modelHasRole->model_id, ['class' => 'form-control' . ($errors->has('model_id') ? ' is-invalid' : ''), 'placeholder' => 'Model Id']) }}
            {!! $errors->first('model_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
