<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

use Illuminate\Http\Request;

class UsersIndex extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name','LIKE','%' . $this->search . '%')
        ->orWhere('email','LIKE','%' . $this->search . '%')
        ->paginate(10);
        return view('livewire.admin.users-index',
        compact('users')
     )
     //->with('i', (request()->input('page', 1) - 1) * $users->perPage())
     ;
    }
    public function index()
    {
        $users = User::where('name','LIKE','%' . $this->search . '%')
        ->orWhere('email','LIKE','%' . $this->search . '%')
        ->paginate(10);

        //$roles = $users->roles['name'];
        //dd($users);
        return view('livewire.admin.users-index',
        compact('users')
     )
     //->with('i', (request()->input('page', 1) - 1) * $users->perPage())
     ;
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit',$user)->with('info','Se asignaron los roles correctamente');
    }


}
