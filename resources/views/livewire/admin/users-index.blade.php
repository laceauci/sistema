@extends('adminlte::page')

@section('title', 'Usuarios')


@section('js')
@vite(['resources/js/app.js'])
@endsection

@livewireStyles


@section('content')
<div>
</br>
    <div class="card">
       <!-- <div class="card-header">
            <input class="form-control" wire:model="search" placeholder="Ingrese el nombre o correo de un usuario">
        </div> -->

        <div class="card-header">
            Listado de usuarios
        </div>
        @if ($users->count())

        <div class="cardbody">
            <table class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->roles->pluck('name') }}
                            </td>
                            <td align="right">
                                @can('admin.users.edit')
                                <a class="btn btn-primary" href="{{ route('admin.users.edit',$user) }}">Asignar rol</a>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {!! $users->links() !!}
        </div>

        @else
        <div class="cardbody">
            <strong>No hay registros</strong>
        </div>
        @endif
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
