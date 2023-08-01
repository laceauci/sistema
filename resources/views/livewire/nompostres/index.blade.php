@extends('adminlte::page')

@section('title', 'Postres')


@section('js')
@vite(['resources/js/app.js'])
@endsection

@livewireStyles


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('nompostres')
        </div>
    </div>
</div>
@livewireScripts

@endsection
@section('footer')
<div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) by Lázaro Arias
    Acea
</div>
@stop
