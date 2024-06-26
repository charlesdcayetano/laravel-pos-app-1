@extends('layouts.app')

@section('content-header', 'ORDERS')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('orders.create') }}" class="btn action-btn add-btn col-auto">Add Order</a>
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
            @if (count($orders) > 0)
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @if ($order->is_deleted == 0)
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->brand }}</td>
                                    <td>{{ $order->color }}</td>
                                    <td>{{ $order->size }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>
                                        <a href="{{ route('orders.edit', $order->id) }}"
                                            class="btn action-btn edit-btn">
                                            <i class="material-symbols-outlined material-icon">edit_square</i>
                                        </a>
                                        <a href="#" class="btn action-btn delete-btn"
                                            onclick="
                                        document.getElementById('delete-product-form').action = '{{ route('orders.destroy', $order->id) }}';
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
            {{ $orders->withQueryString()->links() }}
        </div>
    </div>
@endsection
