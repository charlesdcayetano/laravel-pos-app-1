@extends('layouts.app')

@section('content-header', 'PRODUCTS')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('products.create') }}" class="btn action-btn add-btn col-auto">Add Product</a>
                    <div class="search-area col-auto p-0">
                        <form action="" method="GET" class="row g-2">
                            @csrf
                            <div class="col-auto">
                                <input type="text" name="search" class="form-control search-input" placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn action-btn search-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-subtitle mt-2">
                @include('includes.messages')
            </div>
        </div>
        <div class="card-body card-table">
            @if (count($products) > 0)
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Material</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            @if ($product->is_deleted == 0)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td class="{{ $product->is_active ? 'text-success' : 'text-danger' }}">{{ $product->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>{{ $product->color }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->material }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn action-btn edit-btn">
                                            <i class="material-symbols-outlined material-icon">edit_square</i>
                                        </a>
                                        <a href="#" class="btn action-btn delete-btn"
                                            onclick="
                                        document.getElementById('delete-product-form').action = '{{ route('products.destroy', $product->id) }}';
                                        document.getElementById('delete-product-form').submit();
                                        ">
                                            <i class="material-symbols-outlined material-icon">delete</i>
                                            <form method="post" id="delete-product-form">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center mt-4">No Products Found.</p>
            @endif
        </div>
        <div class="card-footer">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
@endsection
