@extends('layouts.app')

@section('title', 'Add Product')
@section('content-header', 'CREATE PRODUCT')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Product Details
            </h5>
        </div>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="row g-3">

                    {{-- Name --}}
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Brand --}}
                    <div class="col-12 col-md-6">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" name="brand" id="brand" class="form-control"
                            value="{{ old('brand') }}">
                        @error('brand')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Color --}}
                    <div class="col-12 col-md-6">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" name="color" id="color" class="form-control"
                            value="{{ old('color') }}">
                        @error('color')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Size --}}
                    <div class="col-12 col-md-6">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" name="size" id="size" class="form-control"
                            value="{{ old('size') }}">
                        @error('size')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- material --}}
                    <div class="col-12 col-md-6">
                        <label for="material" class="form-label">Material</label>
                        <input type="text" name="material" id="material" class="form-control"
                            value="{{ old('material') }}">
                        @error('material')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="col-12 col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ old('price') }}">
                        @error('price')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Quantity --}}
                    <div class="col-12 col-md-6">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control"
                            value="{{ old('quantity') }}">
                        @error('quantity')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="col-12 col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <span class="text-danger text-sm">Select a valid supplier.</span>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="col-12">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn action-btn save-btn">Save</button>
                <a href="{{ route('products.index') }}" class="btn action-btn cancel-btn">Go Back</a>
            </div>
        </form>
    </div>
@endsection
