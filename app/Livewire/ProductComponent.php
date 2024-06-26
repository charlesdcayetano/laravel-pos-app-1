<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductComponent extends Component
{
    public $product;

    public function addToCart()
    {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'price' => $this->product->price,
            'qty' => 1,
            'options' => ['size' => $this->product->size]
        ]);
    }

    public function render()
    {
        return view('livewire.product-component');
    }
}
