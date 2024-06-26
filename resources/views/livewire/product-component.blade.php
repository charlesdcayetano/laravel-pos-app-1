<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card">
        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title mb-0">{{ $product->name }}</h5>
            <h6 class="card-text text-truncate">
                {{ '₱' . number_format($product->price, 2, '.', ',') }}</h6>
            <p class="card-text mb-0 text-truncate">{{ $product->brand }}</p>
            <p class="card-text mb-0 text-truncate">{{ $product->size }} - {{ $product->color }}</p>
            <p class="card-text mb-1 text-truncate">Stock: {{ $product->quantity }}</p>
            <a href="#" class="btn btn-primary" wire:click="addToCart({{ $product->id }})">Add To Cart</a>
        </div>
    </div>
</div>
