<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);

        return view('roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => ['required'],
        ]);

        Role::create($fields);

        return redirect()->route('roles.index')->with('message_success', 'Role Created Successfully');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $fields = $request->validate([
            'name' => ['required'],
        ]);

        $role->update($fields);

        return redirect()->route('roles.index')->with('message_success', 'Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->update(['is_deleted' => true]);

        return redirect()->route('roles.index')->with('message_success', 'Role Deleted Successfully');
    }
}
