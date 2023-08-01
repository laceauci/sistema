@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
<hi>Asignar un rol</hi>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success" >
    <strong>{{ session('info') }}</strong>
</div>
@endif

<div class="card">
    <div class="card-body">
        <p class="h5">Nombre</p>
        <p class="form-control">{{ $user->name }}</p>

<h2 class="h5">Listado de roles</h2>
        {!! Form::model($user, ['route' => ['admin.users.update',$user], 'method' => 'put' ]) !!}
@foreach ($roles as $role)
    <div>
        <label>

            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
            {{ $role->name }}

        </label>
    </div>
@endforeach

{!! Form::submit('Asignar roles', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!}

    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>console.log('Hi');</script>
@stop

@section('footer')
<!--Footer-->
            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) by Lázaro Arias
                Acea
            </div>
@stop
