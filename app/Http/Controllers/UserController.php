<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();

        return view('admin.views.admin-users', compact('users', 'roles'));
    }

    //  CREATE USER
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'nullable|digits:10',
            'password' => 'required|confirmed|min:8',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return back()->with('success', 'User created');
    }

    //  UPDATE USER
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile' => 'nullable|digits:10',
            'password' => 'nullable|confirmed|min:8',
            'role' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ];

        // Only update password if entered
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // update role
        $user->syncRoles([$request->role]);

        return back()->with('success', 'User updated');
    }

    //  DELETE USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        //  protect super admin
        if ($user->hasRole('super-admin')) {
            return back()->with('error', "You can't delete Super Admin");
        }

        $user->delete();

        return back()->with('success', 'User deleted');
    }
}