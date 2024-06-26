<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::latest()->paginate(10);

        return view('payment-methods.index', ['paymentMethods' => $paymentMethods]);
    }

    public function create()
    {
        return view('payment-methods.create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => ['required'],
        ]);

        PaymentMethod::create($fields);

        return redirect()->route('payment-methods.index')->with('message_success', 'PaymentMethod Created Successfully');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('payment-methods.edit', ['paymentMethod' => $paymentMethod]);
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $fields = $request->validate([
            'name' => ['required'],
        ]);

        $paymentMethod->update($fields);

        return redirect()->route('payment-methods.index')->with('message_success', 'PaymentMethod Updated Successfully');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->update(['is_deleted' => true]);

        return redirect()->route('payment-methods.index')->with('message_success', 'PaymentMethod Deleted Successfully');
    }
}
