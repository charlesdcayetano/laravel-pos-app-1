<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::latest()->paginate(10);

        return view('genders.index', ['genders' => $genders]);
    }

    public function create()
    {
        return view('genders.create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => ['required'],
        ]);

        Gender::create($fields);

        return redirect()->route('genders.index')->with('message_success', 'Gender Created Successfully');
    }

    public function edit(Gender $gender)
    {
        return view('genders.edit', ['gender' => $gender]);
    }

    public function update(Request $request, Gender $gender)
    {
        $fields = $request->validate([
            'name' => ['required'],
        ]);

        $gender->update($fields);

        return redirect()->route('genders.index')->with('message_success', 'Gender Updated Successfully');
    }

    public function destroy(Gender $gender)
    {
        $gender->update(['is_deleted' => true]);

        return redirect()->route('genders.index')->with('message_success', 'Gender Deleted Successfully');
    }
}
