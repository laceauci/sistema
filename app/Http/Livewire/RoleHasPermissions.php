<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RoleHasPermission;
use App\Models\Vistas\VistaUsuarioRolPermiso;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissions extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $permission_id, $role_id;

    public function render()
    {
        /*$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.role-has-permissions.view', [
            'role_has_permissions' => RoleHasPermission::latest()
						->orWhere('permission_id', 'LIKE', $keyWord)
						->orWhere('role_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);*/


        $keyWord = '%' . $this->keyWord . '%';
        $permissions = Permission::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');
        /*$role_has_permissions = RoleHasPermission::latest()
            ->orWhere('permission_id', 'LIKE', $keyWord)
            ->orWhere('role_id', 'LIKE', $keyWord)
            ->paginate(10);*/
        $role_has_permissions =
        RoleHasPermission::latest()
        ->join("roles", "roles.id", "=", "role_has_permissions.role_id")
        ->join("permissions", "permissions.id", "=", "role_has_permissions.permission_id")
        ->orWhere('roles.name', 'LIKE', $keyWord)
        ->orWhere('permissions.name', 'LIKE', $keyWord)
        ->select("role_has_permissions.*", "roles.name as rol ","permissions.name as permission ")
        //->get()
        ->paginate(10)
        ;
        /*$role_has_permissions =
        VistaUsuarioRolPermiso::latest()
        //->join("roles", "roles.id", "=", "role_has_permissions.role_id")
        //->join("permissions", "permissions.id", "=", "role_has_permissions.permission_id")
        ->orWhere('rol', 'LIKE', $keyWord)
        ->orWhere('permiso', 'LIKE', $keyWord)
        //->select("role_has_permissions.*", "roles.name as rol ","permissions.name as permission ")
        //->get()
        ->paginate(10)
        ;*/

        return view(
            'livewire.role-has-permissions.view',
            compact(
                'role_has_permissions',
                'permissions',
                'roles'
            )

        );
    }
    public function index()
    {
        $keyWord = '%' . $this->keyWord . '%';
        $permissions = Permission::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');

        /*$role_has_permissions = RoleHasPermission::latest()
        ->orWhere('permission_id', 'LIKE', $keyWord)
        ->orWhere('role_id', 'LIKE', $keyWord)
        ->paginate(10)

        ;*/
        $role_has_permissions =
        RoleHasPermission::latest()
        ->join("roles", "roles.id", "=", "role_has_permissions.role_id")
        ->join("permissions", "permissions.id", "=", "role_has_permissions.permission_id")
        //->orWhere('role_has_permissions.permission_id', 'LIKE', $keyWord)
        //->orWhere('role_has_permissions.role_id', 'LIKE', $keyWord)
        ->orWhere('roles.name', 'LIKE', $keyWord)
        ->orWhere('permissions.name', 'LIKE', $keyWord)
        ->select("role_has_permissions.*", "roles.name as rol ","permissions.name as permission ")
        //->get()
        ->paginate(10);

        /*$role_has_permissions =
        VistaUsuarioRolPermiso::latest()
        //->join("roles", "roles.id", "=", "role_has_permissions.role_id")
        //->join("permissions", "permissions.id", "=", "role_has_permissions.permission_id")
        ->orWhere('rol', 'LIKE', $keyWord)
        ->orWhere('permiso', 'LIKE', $keyWord)
        //->select("role_has_permissions.*", "roles.name as rol ","permissions.name as permission ")
        //->get()
        ->paginate(10)
        ;*/



        //dd($role_has_permissions);


        return view(
            'livewire.role-has-permissions.index',
            compact(
                'role_has_permissions',
                'permissions',
                'roles'
            )

        );

        /*return view('livewire.role-has-permissions.index', [
            'role_has_permissions' => RoleHasPermission::latest()
						->orWhere('permission_id', 'LIKE', $keyWord)
						->orWhere('role_id', 'LIKE', $keyWord)
						->paginate(10),
                        'permissions'
        ]);*/
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->permission_id = null;
        $this->role_id = null;
    }

    public function store()
    {
        $this->validate([
            'permission_id' => 'required',
            'role_id' => 'required',
        ]);

        RoleHasPermission::create([
            'permission_id' => $this->permission_id,
            'role_id' => $this->role_id
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'RoleHasPermission Successfully created.');
    }

    public function edit($id)
    {
        $permissions = Permission::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');
        $record = RoleHasPermission::findOrFail($id);
        $this->selected_id = $id;
        $this->permission_id = $record->permission_id;
        $this->role_id = $record->role_id;
    }

    public function update()
    {
        $this->validate([
            'permission_id' => 'required',
            'role_id' => 'required',
        ]);

        if ($this->selected_id) {
            $permissions = Permission::pluck('name', 'id');
            $roles = Role::pluck('name', 'id');

            $record = RoleHasPermission::find($this->selected_id);
            $record->update([
                'permission_id' => $this->permission_id,
                'role_id' => $this->role_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'RoleHasPermission Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            RoleHasPermission::where('id', $id)->delete();
        }
    }
}
