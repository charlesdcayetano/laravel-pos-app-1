<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PaymentTransaction;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(9);

        return view('pos.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(FacadesCart::content());
        $fields = [
            'total' => FacadesCart::subtotal(),
            'customer_id' => 1,
            'payment_method_id' => 1,
        ];
        
        PaymentTransaction::create($fields);

        foreach (FacadesCart::content() as $item) {

            $ordersItem = [
                'quantity' => $item->qty,
                'price' => $item->price,
                'product_id' => $item->id,
                'payment_transaction_id' => PaymentTransaction::latest()->first()->id,
            ];

            Order::create($ordersItem);
        }
        
        FacadesCart::destroy();
        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
