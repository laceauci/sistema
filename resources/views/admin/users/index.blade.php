@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
<div class="card-header">
    Listado de usuarios
    </div>
@stop
@livewireStyles
@section('content')
@livewire('admin.users-index')

@livewireScripts
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@vite(['resources/js/app.js'])
@stop

@section('footer')
<!--Footer-->
            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) by Lázaro Arias
                Acea
            </div>
@stop
