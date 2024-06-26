<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        $cartItems = Cart::content();

        return view('livewire.cart-component', compact('cartItems'));
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);

        // $this->emit('cartItemsUpdated'); // Emit an event to trigger a cart update notification
    }
}
