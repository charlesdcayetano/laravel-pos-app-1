@extends('layouts.app')

@section('title', 'Edit Order')
@section('content-header', 'EDIT ORDER')
@section('content')

    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Order Details
            </h5>
        </div>
        <form action="{{ route('orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body card-form">
                <div class="row g-3">

                    {{-- Name --}}
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="company_name" class="form-control"
                            value="{{ $product->name }}">
                        @error('name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Brand --}}
                    <div class="col-12 col-md-6">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" name="brand" id="brand" class="form-control"
                            value="{{ $product->brand }}">
                        @error('brand')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- color --}}
                    <div class="col-12 col-md-6">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" name="color" id="color" class="form-control"
                            value="{{ $product->color }}">
                        @error('color')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Size --}}
                    <div class="col-12 col-md-6">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" name="size" id="size" class="form-control"
                            value="{{ $product->size }}">
                        @error('size')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- price --}}
                    <div class="col-12 col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ $product->price }}">
                        @error('price')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Quantity --}}
                    <div class="col-12 col-md-6">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control"
                            value="{{ $product->quantity }}">
                        @error('quantity')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            <div class="card-footer text-end">
                        <button type="submit" class="btn action-btn save-btn">Save</button>
                        <a href="{{ route('orders.index') }}" class="btn action-btn cancel-btn">Go Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
