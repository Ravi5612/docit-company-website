<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        $permissions = Permission::all();
        return view('admin.views.admin-roles', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);


        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }

        return back()->with('success', 'Role created successfully');
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $id
        ]);

        // update name
        $role->update([
            'name' => $request->name
        ]);


        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]); // remove all if none selected
        }

        return back()->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->name == 'super-admin') {
            return back()->with('error', "You can't delete Super Admin role");
        }

        $role->delete();

        return back()->with('success', 'Role deleted successfully');
    }
}