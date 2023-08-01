 @extends('adminlte::page')

 @section('title', 'Empleado')

 @section('js')
@vite(['resources/js/app.js'])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

        <!-- <p>Este contenido es púlico</p>  -->
        @role('Admin')
           <!-- <p>Este contenido es solo para el rol admin </p> -->
        @endrole
        @role('escritor')
            <!-- <p>Este contenido es solo para el rol de escritor</p> -->
        @endrole
        @role('Admin')
            @if (Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <span id="card_title">
                        {{ __('Empleado') }}
                    </span>
                    <div class="float-right">
                        <a href="{{ route('admin.empleado.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                          {{ __('Create New') }}
                        </a>
                      </div>

                </div>
            </div>

            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>

                            <td>
                                <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->Foto }}"
                                    width="100" alt="" >
                            </td>

                            <td>{{ $empleado->Nombre }}</td>
                            <td>{{ $empleado->ApellidoPaterno }}</td>
                            <td>{{ $empleado->ApellidoMaterno }}</td>
                            <td>{{ $empleado->Correo }}</td>
                            <td>
                                <a href="{{ url('/admin/empleado/' . $empleado->id . '/edit') }}" class="btn btn-warning">
                                    Editar
                                </a>
                                |
                                <form action="{{ url('/admin/empleado/' . $empleado->id) }}" method="post" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')"
                                        value="Borrar">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            {{ $empleados->links() }}


                </div>
                </div>
        </div>
    @endrole
@endsection

@section('footer')
<div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) by Lázaro Arias
    Acea
</div>
@stop
