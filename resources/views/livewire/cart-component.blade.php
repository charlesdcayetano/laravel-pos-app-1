<div>
    <div class="card">
        <div class="card-header">
            Your Shopping Cart
        </div>
        <div class="card-body">
            @if (Cart::count() > 0)
                <ul class="list-group">
                    @foreach ($cartItems as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="w-75">
                                {{ $item->name }} ({{ $item->qty }})
                                @if ($item->options->has('size'))
                                    - Size: {{ $item->options->size }}
                                @endif
                            </div>
                            <span class="badge bg-primary rounded-pill">
                                ₱{{ number_format($item->price * $item->qty, 2) }}
                            </span>
                            <button wire:click="removeItem('{{ $item->rowId }}')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{-- route('checkout') --}}" class="btn btn-primary">Checkout</a>
                </div>
            @else
                <p class="text-center">Your cart is currently empty.</p>
            @endif
        </div>
    </div>
</div>
