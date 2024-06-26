<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::latest()->paginate(25);
        $genders = Gender::get();
        $roles = Role::get();

        // Get the gender names & role names for each user in the users table
        foreach ($users as $user) {
            $user->gender_name = $genders->where('id', $user->gender_id)->first()->name;
            $user->role_name = $roles->where('id', $user->role_id)->first()->name;
        }

        return view('users.index', ['users' => $users]);
    }

    //show
    // public function show(User $user)
    // {
    //     dd($user);

    //     return view('users.show', ['user' => $user]);
    // }

    //create
    public function create()
    {
        $genders = Gender::get();
        $roles = Role::get();

        return view('users.create', ['genders' => $genders, 'roles' => $roles]);
    }

    //store
    public function store(Request $request)
    {
        // dd($request);

        $fields = $request->validate([
            'first_name' => ['required'],
            'middle_name' => "",
            'last_name' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'gender_id' => ['required'],
            'role_id' => ['required'],
            'profile_photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:25000'],
        ]);

        User::create($fields);

        return redirect('/users')->with('message_success', 'User Created Successfully');
    }

    //edit
    public function edit(User $user)
    {
        $genders = Gender::get();
        $roles = Role::get();
        return view('users.edit', ['user' => $user, 'genders' => $genders, 'roles' => $roles]);
    }

    //update
    public function update(Request $request, User $user)
    {
        $field = $request->validate(
            [
                'first_name' => ['required'],
                'middle_name' => ['nullable'],
                'last_name' => ['required'],
                'username' => ['required', 'unique:users,username,' . $user->id],
                'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'gender_id' => ['required', 'numeric'],
                'role_id' => ['required', 'numeric'],
                'profile_photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:25000'],
            ],
        );

        $user->update($field);
        return redirect()->route('users.index')->with('message_success', 'User Updated Successfully');
    }

    //destroy
    public function destroy(User $user) {
        // dd($user->id);
        $user->update([
            'is_deleted' => true
        ]);

        return redirect()->route('users.index')->with('message_success', 'User Deleted Successfully');
    }

}
