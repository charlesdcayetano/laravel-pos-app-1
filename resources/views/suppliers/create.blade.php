@extends('layouts.app')

@section('title', 'Add Supplier')
@section('content-header', 'CREATE SUPPLIER')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Supplier Details
            </h5>
        </div>
        <form action="{{ route('suppliers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="row g-3">
                    
                    {{-- Company Name --}}
                    <div class="col-12 col-md-6">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control"
                            value="{{ old('company_name') }}">
                        @error('company_name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Contact Name --}}
                    <div class="col-12 col-md-6">
                        <label for="contact_name" class="form-label">Contact Name</label>
                        <input type="text" name="contact_name" id="contact_name" class="form-control"
                            value="{{ old('conact_name') }}">
                        @error('contact_name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="col-12 col-md-4">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ old('address') }}">
                        @error('address')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- City --}}
                    <div class="col-12 col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control"
                            value="{{ old('city') }}">
                        @error('city')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Region --}}
                    <div class="col-12 col-md-4">
                        <label for="region" class="form-label">Region</label>
                        <input type="text" name="region" id="region" class="form-control"
                            value="{{ old('region') }}">
                        @error('region')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Postal Code --}}
                    <div class="col-12 col-md-4">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" id="postal_code" class="form-control"
                            value="{{ old('postal_code') }}">
                        @error('postal_code')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Country --}}
                    <div class="col-12 col-md-4">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" id="country" class="form-control"
                            value="{{ old('country') }}">
                        @error('country')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Phone  --}}
                    <div class="col-12 col-md-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn action-btn save-btn">Save</button>
                <a href="{{ route('suppliers.index') }}" class="btn action-btn cancel-btn">Go Back</a>
            </div>
        </form>
    </div>
@endsection
