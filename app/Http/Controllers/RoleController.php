<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Models\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:roles.create', ['only' => ['create', 'store']]);
        $this->middleware('can:roles.index', ['only' => ['index']]);
        $this->middleware('can:roles.edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:roles.show', ['only' => ['show']]);
        $this->middleware('can:roles.destroy', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }
    public function store(StoreRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('admin.roles.index', $role)->with('success', 'Se registró correctamente');;
    }
    public function show(Role $role)
    {
        $roles = Role::get();
        $users = User::get();
        $permissions = Permission::get();
        return view('admin.role.show', compact('role', 'permissions', 'users'));
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }
    public function update(UpdateRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('admin.roles.index', $role)->with('update', 'Se editó correctamente');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('delete', 'ok');
    }
}
