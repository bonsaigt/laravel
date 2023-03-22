<?php
namespace App\Http\Controllers\Catalogs;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserRolesController extends Controller
{
    public function show($id)
    {
        $user = User::query()
            ->select('id', 'name')
            ->with('roles:id,name')
            ->find($id);

        $active = $user->roles
            ->pluck('name')
            ->toArray();

        $roles = Role::query()
            ->select('id', 'name')
            ->orderBy('id')
            ->get()
            ->map(function ($role) use ($active) {
                return [
                    'id'       => $role->id,
                    'name'     => $role->name,
                    'selected' => in_array($role->name, $active),
                ];
            });

        return view('component')
            ->with('component', 'roles')
            ->with('title', 'Roles del usuario ' . $user->name)
            ->with('params', [
                'user'  => $user,
                'roles' => $roles,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id'           => ['required', 'exists:users'],
            'roles'        => ['required'],
            'roles.*.name' => ['required'],
        ]);

        $roles_list = collect($request->roles)
            ->filter(function ($role) {
                return $role['selected'];
            })
            ->map(function ($role) {
                return $role['name'];
            })
            ->toArray();

        $user = User::find($request->id);
        $user->syncRoles($roles_list);

        return;
    }
}
