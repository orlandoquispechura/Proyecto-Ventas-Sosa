<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:home');
        $this->middleware('permission:users.create|users.index|users.edit|users.show|users.destroy', ['only'=>['create','store']]);
        $this->middleware('permission:users.index',['only'=>['index']]);
        $this->middleware('permission:users.edit',['only'=>['edit','update']]);
        $this->middleware('permission:users.show',['only'=>['show']]);
        $this->middleware('permission:users.destroy',['only'=>['destroy']]);
    }
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
        $this->validate($request, [
            'name' => 'required|string','name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            // 'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        if ($user->id == 1) {
            return redirect()->route('users.index');
        }else{
            $user->update($request->all());
            $user->roles()->sync($request->get('roles'));
            return redirect()->route('users.index')->with('update', 'Se editó correctamente');
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
