<?php
namespace App\Http\Controllers\Catalogs;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function show($id)
    {
        $role = Role::query()
            ->select('id', 'name')
            ->with('permissions:id,name')
            ->findOrFail($id);

        $active = $role->permissions
            ->pluck('name')
            ->toArray();

        $permissions = Permission::query()
            ->select('id', 'name', 'title')
            ->orderBy('id')
            ->get()
            ->map(function ($permission) use ($active) {
                return [
                    'id'       => $permission->id,
                    'name'     => $permission->name,
                    'title'    => $permission->title,
                    'selected' => in_array($permission->name, $active),
                ];
            });

        return view('component')
            ->with('component', 'permissions')
            ->with('title', 'Permisos del rol ' . $role->name)
            ->with('params', [
                'role'        => $role,
                'permissions' => $permissions,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id'                 => ['required', 'exists:roles'],
            'permissions'        => ['required'],
            'permissions.*.name' => ['required'],
        ]);

        $permission_list = collect($request->permissions)
            ->filter(function ($permission) {
                return $permission['selected'];
            })
            ->map(function ($permission) {
                return $permission['name'];
            })
            ->toArray();

        $role = Role::find($request->id);
        $role->syncPermissions($permission_list);

        return;
    }
}
