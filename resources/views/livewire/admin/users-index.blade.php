<div>
    <div class="card">
        <div class="card-header">
            <input class="form-control" wire:model="search" placeholder="Ingrese el nombre o correo de un usuario">
        </div>
        @if ($users->count())

        <div class="cardbody">
            <table class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{ route('admin.users.edit',$user) }}">Editar</a>
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

