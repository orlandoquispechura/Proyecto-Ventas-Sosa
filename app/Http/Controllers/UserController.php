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
        $this->middleware('auth');
        $this->middleware('can:home');
        $this->middleware('can:users.create', ['only'=>['create','store']]);
        $this->middleware('can:users.index',['only'=>['index']]);
        $this->middleware('can:users.edit',['only'=>['edit','update']]);
        $this->middleware('can:users.show',['only'=>['show']]);
        $this->middleware('can:users.destroy',['only'=>['destroy']]);
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
            'name' => 'required|max:20|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ñ,&]+$/',
            'email' => 'required|email|max:100|unique:users,email',
            // 'password' => 'required|min:8|max:10|regex:/^[A-Z,a-z,#,$,&][0-9]{8,10}$/',
            'password' => [
                'required',
                'min:8',
                'max:10',            
                'regex:/[a-z]/',     
                'regex:/[A-Z]/',      
                'regex:/[0-9]/',      
                'regex:/[@$!%*#?&]/', 
            ],
            
        ]);
        $user = User::create($request->all());
        $user->update(['password'=> Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('admin.users.index')->with('success', 'Se registró correctamente');
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
        //'email' => 'nullable|email|unique:clientes,email,' . $this->route('cliente')->id . '|max:100',
        
        $this->validate($request, [
            'name' => 'required|max:20|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ñ,&]+$/',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'max:10',            
                'regex:/[a-z]/',     
                'regex:/[A-Z]/',      
                'regex:/[0-9]/',      
                'regex:/[@$!%*#?&]/', 
            ],
        ]);
        $password = $request->input('password');
        if($password){
            $user->update(['password'=> Hash::make($request->password)]);
            $user->roles()->sync($request->get('roles'));
            dd($user);
            return redirect()->route('admin.users.index')->with('success', 'Se registró correctamente');
        }

        // if ($user->id == 1) {
        //     return redirect()->route('admin.users.index');
        // }else{
        //     $password = $request->input('password');
        //     $user->update($request->all());
        //     $user->roles()->sync($request->get('roles'));
        //     return redirect()->route('admin.users.index')->with('update', 'Se editó correctamente');
        // }
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
