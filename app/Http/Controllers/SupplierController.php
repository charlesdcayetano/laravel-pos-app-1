<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);

        return view('suppliers.index', ['suppliers' => $suppliers]);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'company_name' => ['required'],
            'contact_name' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'region' => ['required'],
            'postal_code' => ['required'],
            'country' => ['required'],
            'phone' => ['required'],
        ]);

        Supplier::create($fields);

        return redirect()->route('suppliers.index')->with('message_success', 'Supplier Created Successfully');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $fields = $request->validate([
            'company_name' => ['required'],
            'contact_name' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'region' => ['required'],
            'postal_code' => ['required'],
            'country' => ['required'],
            'phone' => ['required'],
        ]);

        $supplier->update($fields);

        return redirect()->route('suppliers.index')->with('message_success', 'Supplier Updated Successfully');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->update(['is_deleted' => true]);

        return redirect()->route('suppliers.index')->with('message_success', 'Supplier Deleted Successfully');
    }
}
