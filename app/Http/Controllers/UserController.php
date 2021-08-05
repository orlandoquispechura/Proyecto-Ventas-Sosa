<?php

namespace App\Http\Controllers;

use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password'=> Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index')->with('success', 'Se registró correctamente');
    }
    public function show(User $user)
    {
        $total_compras = 0;
        foreach ($user->ventas as $key =>  $venta) {
            $total_compras+=$venta->total;
        }
        $total_monto = 0;
        foreach ($user->compras as $key =>  $compra) {
            $total_monto+=$compra->total;
        }
        return view('admin.user.show', compact('user', 'total_compras', 'total_monto'));
    }
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        if ($user->id == 1) {
            return redirect()->route('users.index');
        }else{
            $user->update($request->all());
            $user->roles()->sync($request->get('roles'));
            return redirect()->route('users.index')->with('update', 'Se editó el correctamente');
        }
    }
    public function destroy(User $user)
    {
        if ($user->id == 1) {
            return back()->with('delete', 'ok');
        } else {
            $user->delete();
            return back()->with('delete', 'ok');
        }
    }
}
