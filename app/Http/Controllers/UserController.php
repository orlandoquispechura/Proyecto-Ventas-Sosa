<?php
//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
namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:users.create', ['only' => ['create', 'store']]);
        $this->middleware('can:users.index', ['only' => ['index']]);
        $this->middleware('can:users.edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:users.show', ['only' => ['show']]);
        $this->middleware('can:users.destroy', ['only' => ['destroy']]);
    }
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }
    public function store(StoreRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->roles()->sync($request->input('roles'));
        return redirect()->route('admin.users.index')->with('success', 'Se registró correctamente');
    }
    public function show(User $user)
    {
        $total_compras = 0;
        foreach ($user->ventas as $key =>  $venta) {
            $total_compras += $venta->total;
        }
        $total_monto = 0;
        foreach ($user->compras as $key =>  $compra) {
            $total_monto += $compra->total;
        }
        return view('admin.user.show', compact('user', 'total_compras', 'total_monto'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.user.edit', compact('user', 'roles', 'userRole'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:20|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ñ,&]+$/',
            'email' => 'required|email|max:100,|unique:users,email,' . $id,
            'password' => 'nullable|min:8|max:10',
            'role' => 'nullable',
        ]);

        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $user)->delete();
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('admin.users.index')->with('update', 'Se editó correctamente');
    }
    public function destroy(User $user)
    {

        $item_1 = $user->ventas()->count();
        if ($item_1 > 0) {
            return redirect()->back()->with('error', 'No se puede eliminar este usuario por que tiene ventas realizadas.');
        }
        $item_2 = $user->compras()->count();
        if ($item_2 > 0) {
            return redirect()->back()->with('error', 'No se puede eliminar este usuario por que realizó compras en el sistema.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('delete', 'ok');
    }
}
