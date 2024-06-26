<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="row mb-2">
                <div class="col-12">
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
            <div class="row prod-row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                            <div class="card-body overflow-hidden">
                                <h5 class="card-title mb-0">{{ $product->name }}</h5>
                                <h6 class="card-text text-truncate">
                                    {{ '₱' . number_format($product->price, 2, '.', ',') }}</h6>
                                <p class="card-text mb-0 text-truncate">{{ $product->brand }}</p>
                                <p class="card-text mb-0 text-truncate">{{ $product->size }} - {{ $product->color }}</p>
                                <p class="card-text mb-1 text-truncate">Stock: {{ $product->quantity }}</p>
                                <a href="#" class="btn action-btn edit-btn"
                                    wire:click="addToCart({{ $product->id }})">Add</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Order Summary</h5>
                </div>
                <div class="card-body">
                    @if (Cart::count() > 0)
                        <ul class="list-group">
                            @foreach ($cartItems as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="w-75 text-truncate">
                                        {{ $item->name }} (<strong>{{ $item->qty }}</strong>)
                                        @if ($item->options->has('size'))
                                            - Size: {{ $item->options->size }}
                                        @endif
                                    </div>
                                    <a wire:click="removeItem('{{ $item->rowId }}')"
                                        class="btn action-btn delete-btn">
                                        <i class="material-symbols-outlined">delete</i>
                                    </a>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="w-75 text-truncate">Total</span>
                                <span><b>₱ {{Cart::subtotal()}}</b></span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="#" class="btn action-btn save-btn" onclick="
                                event.preventDefault(); 
                                document.getElementById('checkout-form').action = '{{ route('cart.store') }}';
                                document.getElementById('checkout-form').submit();
                                ">
                                Checkout
                                <form method="post" id="checkout-form">
                                    @csrf
                                    @method('POST')
                                </form>

                                
                            </a>
                        </div>
                    @else
                        <p class="text-center">Your cart is currently empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
