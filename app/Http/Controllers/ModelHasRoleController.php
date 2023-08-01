<?php

namespace App\Http\Controllers;

use App\Models\ModelHasRole;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

/**
 * Class ModelHasRoleController
 * @package App\Http\Controllers
 */
class ModelHasRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelHasRoles = ModelHasRole::paginate();
        $users = User::pluck('name','id');
        $roles = Role::pluck('name','id');

        return view('model-has-role.index', compact('modelHasRoles','users','roles'))
            ->with('i', (request()->input('page', 1) - 1) * $modelHasRoles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelHasRole = new ModelHasRole();
        $users = User::pluck('name','id');
        $roles = Role::pluck('name','id');
        return view('model-has-role.create', compact('modelHasRole','users','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ModelHasRole::$rules);

        $modelHasRole = ModelHasRole::create($request->all());

        return redirect()->route('model-has-role.index')
            ->with('success', 'ModelHasRole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $modelHasRole = ModelHasRole::find($id);
        $users = User::pluck('name','id');
        $roles = Role::pluck('name','id');

        return view('model-has-role.show', compact('modelHasRole','users','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelHasRole = ModelHasRole::find($id);
        $users = User::pluck('name','id');
        $roles = Role::pluck('name','id');

        return view('model-has-role.edit', compact('modelHasRole','users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ModelHasRole $modelHasRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelHasRole $modelHasRole)
    {
        request()->validate(ModelHasRole::$rules);

        $modelHasRole->update($request->all());

        return redirect()->route('model-has-role.index')
            ->with('success', 'ModelHasRole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $modelHasRole = ModelHasRole::find($id)->delete();

        return redirect()->route('model-has-role.index')
            ->with('success', 'ModelHasRole deleted successfully');
    }
}
