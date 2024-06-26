<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::latest()->paginate(10);

        return view('discounts.index', ['discounts' => $discounts]);
    }

    public function create()
    {
        return view('discounts.create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'percentage' => ['required', 'numeric'],
            'description' => ['required'],
        ]);

        Discount::create($fields);

        return redirect()->route('discounts.index')->with('message_success', 'Discount Created Successfully');
    }

    public function edit(Discount $discount)
    {
        return view('discounts.edit', ['discount' => $discount]);
    }

    public function update(Request $request, Discount $discount)
    {
        $fields = $request->validate([
            'percentage' => ['required', 'numeric'],
            'description' => ['required'],
        ]);

        $discount->update($fields);

        return redirect()->route('discounts.index')->with('message_success', 'Discount Updated Successfully');
    }

    public function destroy(Discount $discount)
    {
        $discount->update(['is_deleted' => true]);

        return redirect()->route('discounts.index')->with('message_success', 'Discount Deleted Successfully');
    }
}
