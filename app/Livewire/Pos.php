<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Pos extends Component
{
    

    public function addToCart(Product $product)
    {
        // dd($product);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
            'options' => ['size' => $product->size]
        ]);
    }

    public function render()
    {
        $products = Product::get();
        $cartItems = Cart::content();
        return view('livewire.pos', compact('cartItems', 'products'));
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
    }

    public function storeCartItems()
    {
        dd(Cart::content());
    }
}
