@extends('layouts.app')

@section('title', 'Edit Product')
@section('content-header', 'EDIT PRODUCT')
@section('content')

    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Product Details
            </h5>
        </div>
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
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

                    {{-- material --}}
                    <div class="col-12 col-md-6">
                        <label for="material" class="form-label">Material</label>
                        <input type="text" name="material" id="material" class="form-control"
                            value="{{ $product->material }}">
                        @error('material')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="col-12 col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger text-sm">Select a valid category.</span>
                        @enderror
                    </div>

                    {{-- Supplier --}}
                    <div class="col-12 col-md-6">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="form-select">
                            <option>Select a supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ $product->supplier_id === $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->company_name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <span class="text-danger text-sm">Select a valid supplier.</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-12 col-md-6">
                        <label for="is_active" class="form-label">Status</label>
                        <select name="is_active" id="is_active" class="form-select">
                            <option value="1" {{ $product->is_active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $product->is_active ? '' : 'selected' }}>Inactive</option>
                        </select>
                        @error('is_active')
                            <span class="text-danger text-sm">Select a valid status.</span>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-12 col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control"
                            value="{{ $product->description }}">
                        @error('description')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="col-12 col-md-6">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" value="{{ $product->image }}">
                        @error('image')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Current Image --}}
                    <div class="col-12 col-md-6">
                        <label>Current Image</label><br>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="img-fluid img-thumbnail">
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn action-btn save-btn">Save</button>
                        <a href="{{ route('products.index') }}" class="btn action-btn cancel-btn">Go Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
